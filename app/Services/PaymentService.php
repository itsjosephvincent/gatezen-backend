<?php

namespace App\Services;

use App\Enum\OrderStatus;
use App\Events\OrderCreatedEvent;
use App\Events\PaymentCompleteEvent;
use App\Exceptions\Cart\EmptyCartException;
use App\Exceptions\Payment\InvalidPaymentException;
use App\Http\Resources\CheckoutResource;
use App\Http\Resources\CheckPaymentSessionResource;
use Throwable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\OrderResource;
use App\Jobs\SendStripePaymentErrorEmail;
use App\Interfaces\Services\CartServiceInterface;
use App\Interfaces\Services\OrderServiceInterface;
use App\Interfaces\Services\PaymentServiceInterface;
use App\Interfaces\Repositories\CartRepositoryInterface;
use App\Interfaces\Repositories\ErrorRepositoryInterface;
use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Repositories\SalesRepositoryInterface;
use App\Interfaces\Repositories\PaymentRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\CustomerRepositoryInterface;
use App\Interfaces\Repositories\ShippingRepositoryInterface;
use App\Interfaces\Repositories\OrderDetailsRepositoryInterface;
use App\Interfaces\Repositories\PaymentDetailsRepositoryInterface;
use App\Interfaces\Repositories\CustomerAddressRepositoryInterface;
use App\Interfaces\Repositories\VatRepositoryInterface;
use App\Interfaces\Services\KlarnaServiceInterface;
use App\Jobs\SendOrderConfirmation;
use Illuminate\Support\Facades\Log;

class PaymentService implements PaymentServiceInterface
{
    private $stripe;
    private $paymentRepository;
    private $cartRepository;
    private $errorRepository;
    private $paymentDetailsRepository;
    private $salesRepository;
    private $salesService;
    private $orderRepository;
    private $orderDetailsRepository;
    private $shippingRepository;
    private $cartService;
    private $productRepository;
    private $customerRepository;
    private $customerAddressRepository;
    private $orderService;
    private $klarnaService;
    private $vatRepository;

    public function __construct(
        PaymentRepositoryInterface $paymentRepository,
        CartRepositoryInterface $cartRepository,
        ErrorRepositoryInterface $errorRepository,
        PaymentDetailsRepositoryInterface $paymentDetailsRepository,
        SalesRepositoryInterface $salesRepository,
        SalesService $salesService,
        OrderRepositoryInterface $orderRepository,
        OrderDetailsRepositoryInterface $orderDetailsRepository,
        ShippingRepositoryInterface $shippingRepository,
        CartServiceInterface $cartService,
        ProductRepositoryInterface $productRepository,
        CustomerRepositoryInterface $customerRepository,
        CustomerAddressRepositoryInterface $customerAddressRepository,
        OrderServiceInterface $orderService,
        KlarnaServiceInterface $klarnaService,
        VatRepositoryInterface $vatRepository,
    ) {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $this->paymentRepository = $paymentRepository;
        $this->cartRepository = $cartRepository;
        $this->errorRepository = $errorRepository;
        $this->paymentDetailsRepository = $paymentDetailsRepository;
        $this->salesRepository = $salesRepository;
        $this->salesService = $salesService;
        $this->orderRepository = $orderRepository;
        $this->orderDetailsRepository = $orderDetailsRepository;
        $this->shippingRepository = $shippingRepository;
        $this->cartService = $cartService;
        $this->productRepository = $productRepository;
        $this->customerRepository = $customerRepository;
        $this->customerAddressRepository = $customerAddressRepository;
        $this->orderService = $orderService;
        $this->klarnaService = $klarnaService;
        $this->vatRepository = $vatRepository;
    }

    public function saveCbdPreOrderData($address_type, $store)
    {
        try {
            $userId = auth()->user()->id;
            $customer = $this->customerRepository->findOneById($userId);
            $cartData = $this->cartService->findCarts($store);
            $cartItems = $cartData->cart;

            if (count($cartItems) < 1) {
                throw new EmptyCartException();
            }

            $dateTimeToday = date('Ymdhis');
            $orderNo = $dateTimeToday . '-' . Str::random(10);

            $orderTotal = 0;
            $subTotal = 0;
            foreach ($cartItems as $cartItem) {
                $product = $this->productRepository->findOneById($cartItem->product->id);
                $vat = $this->vatRepository->findById($product->vat_id);
                $productVat = $product->price * $vat->percentage;
                $productAmountWithVat = $product->price + $productVat;
                $orderTotal += $productAmountWithVat * $cartItem->quantity;
                $subTotal += $product->price * $cartItem->quantity;
            }

            $discountAmount = $orderTotal * 0.20;
            $discountedOrderTotal = $orderTotal - $discountAmount;
            $orderGrandTotal = $discountedOrderTotal + $cartData->shipping_fee;

            $order = $this->orderRepository->create(
                '',
                $customer,
                $orderNo,
                $orderGrandTotal,
                $cartData->shipping_id,
                OrderStatus::PreOrder->value,
                $discountAmount
            );

            foreach ($cartItems as $cartItem) {
                $product = $this->productRepository->findOneById($cartItem->product->id);
                $this->orderDetailsRepository->create($product, $order, $cartItem->quantity);
            }

            $customerAddress = $this->customerAddressRepository->findOneByCustomerId($address_type, $customer->id);
            $this->shippingRepository->create($order->id, $customerAddress, $customer->mobile);
            $orderSummary = $this->orderService->generateOrderSummary($order);
            $orderData = $this->orderService->findOrderById($order->id);
            $this->cartRepository->deleteManyByCustomerId($customer->id);

            $data = (object) [
                'summary' => (object) [
                    'subtotal' => $orderSummary['subtotal'],
                    'discount' => $orderSummary['discount'],
                    'shipping_method' => $orderSummary['shipping_method'],
                    'shipping_fee' => $orderSummary['shipping_fee'],
                    'vats' => $orderSummary['vats'],
                    'total_amount' => $orderSummary['total_amount']
                ],
                'order' => new OrderResource($orderData)
            ];

            PaymentCompleteEvent::dispatch($order);

            SendOrderConfirmation::dispatch($customer->email, $order, $orderSummary['shipping_method'], $orderSummary['shipping_fee'], $store)
                ->onQueue('sendemail');

            event(new OrderCreatedEvent($order));

            return new CheckPaymentSessionResource($data);
        } catch (Throwable $e) {
            $this->errorRepository->saveError('CBD Pre-Order', $e->getMessage());
            throw $e;
        }
    }

    public function saveStripePaymentData($payload, $store)
    {
        try {
            $cartData = $this->cartService->findCarts($store);
            $cartItems = $cartData->cart;
            $vatItems = $cartData->vat;
            $shippingMethod = $cartData->shipping_method;
            $shippingFee = $cartData->shipping_fee;

            if (count($cartItems) < 1) {
                throw new EmptyCartException();
            }

            $linetems = [];
            $total = 0;
            foreach ($cartItems as $cartItem) {
                $productQuantity = $cartItem->quantity;
                $productName = $cartItem->product ? $cartItem->product->name : '';
                $productPrice = $cartItem->product ? ($cartItem->product->price * 100) : 0;
                $total += $productPrice * $productQuantity;
                array_push($linetems, [
                    'price_data' => [
                        'currency' => 'EUR',
                        'unit_amount' => $productPrice,
                        'product_data' => [
                            'name' => $productName,
                        ],
                    ],
                    'quantity' => $productQuantity,
                ]);
            }

            foreach ($vatItems as $key => $vatItem) {
                $vatName = $key;
                $vatPrice = $vatItem * 100;
                array_push($linetems, [
                    'price_data' => [
                        'currency' => 'EUR',
                        'unit_amount' => $vatPrice,
                        'product_data' => [
                            'name' => $vatName,
                        ],
                    ],
                    'quantity' => 1,
                ]);
            }

            $finalShipping = 0;

            if ($shippingFee == 0) {
                $finalShipping = round($shippingFee);
            } else {
                $finalShipping = $shippingFee * 100;
            }

            $checkout = $this->stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'shipping_options' => [
                    [
                        'shipping_rate_data' => [
                            'type' => 'fixed_amount',
                            'fixed_amount' => ['amount' => $finalShipping, 'currency' => 'eur'],
                            'display_name' => $shippingMethod,
                            'delivery_estimate' => [
                                'minimum' => ['unit' => 'business_day', 'value' => 3],
                                'maximum' => ['unit' => 'business_day', 'value' => 5],
                            ],
                        ],
                    ],
                ],
                'success_url' => $store->url . $payload->success_url . '?checkout_session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $store->url . $payload->cancel_url,
                'line_items' => $linetems,
                'mode' => 'payment',
            ]);

            return new CheckoutResource($checkout);
        } catch (Throwable $e) {
            $this->errorRepository->saveError('Stripe Checkout', $e->getMessage());
            SendStripePaymentErrorEmail::dispatch('Stripe Checkout', $e->getMessage())
                ->onQueue('sendemail');
            throw $e;
        }
    }

    public function saveKlarnaPaymentData($payload, $store)
    {
        try {
            $cartData = $this->cartService->findCarts($store);
            $cartItems = $cartData->cart;
            $shippingKey = $cartData->shipping_key;
            $shippingMethod = $cartData->shipping_method;
            $shippingFee = $cartData->shipping_fee;

            if (count($cartItems) < 1) {
                throw new EmptyCartException();
            }

            $lineItems = [];
            foreach ($cartItems as $cartItem) {
                $productId = $cartItem->product_id;
                $productQuantity = $cartItem->quantity;
                $productName = $cartItem->product ? $cartItem->product->name : '';
                $productPrice = $cartItem->product ? ($cartItem->product->price * 100) : 0;
                array_push($lineItems, [
                    'product' => [
                        'currency' => 'EUR',
                        'unit_price' => $productPrice,
                        'product_data' => [
                            'id' => $productId,
                            'name' => $productName,
                        ],
                    ],
                    'quantity' => $productQuantity,
                ]);
            }


            $result = $this->klarnaService->makePayment($lineItems, $payload, $shippingMethod, $shippingKey, $shippingFee);

            return new CheckoutResource($result);
        } catch (Throwable $e) {
            $this->errorRepository->saveError('Stripe Checkout', $e->getMessage());
            SendStripePaymentErrorEmail::dispatch('Stripe Checkout', $e->getMessage())
                ->onQueue('sendemail');
            throw $e;
        }
    }

    public function checkPayment($payload, $store)
    {
        if ($payload->payment_method === 'Stripe') {
            return $this->stripePaymentSession($payload, $store);
        } else {
            return $this->klarnaPaymentSession($payload, $store);
        }
    }

    public function stripePaymentSession($payload, $store)
    {
        try {
            $checkOutSession = $this->stripe->checkout->sessions->retrieve($payload->checkout_session_id, []);
            $token = $payload->checkout_session_id;

            $paymentDetail = $this->paymentDetailsRepository->findOneByToken($token);
            if ($paymentDetail) {
                $payment = $paymentDetail->payment;
                $orderId = $payment->order_id;
                $order = $this->salesRepository->findOneById($orderId);
                $orderSummary = $this->salesService->generateOrderSummary($order);

                $data = (object) [
                    'summary' => (object) [
                        'subtotal' => $orderSummary['subtotal'],
                        'discount' => $orderSummary['discount'],
                        'shipping_method' => $orderSummary['shipping_method'],
                        'shipping_fee' => $orderSummary['shipping_fee'],
                        'vats' => $orderSummary['vats'],
                        'total_amount' => $orderSummary['total_amount'],
                    ],
                    'order' => new OrderResource($order)
                ];

                return new CheckPaymentSessionResource($data);
            } else if ($checkOutSession->payment_status == 'paid') {
                $userId = auth()->user()->id;
                $customer = $this->customerRepository->findOneById($userId);
                $cartData = $this->cartService->findCarts($store);
                $cartItems = $cartData->cart;

                $dateTimeToday = date('Ymdhis');
                $orderNo = $dateTimeToday . '-' . Str::random(10);

                $orderTotal = 0;
                foreach ($cartItems as $cartItem) {
                    $product = $this->productRepository->findOneById($cartItem->product->id);
                    $vat = $this->vatRepository->findById($product->vat_id);
                    $productVat = $product->price * $vat->percentage;
                    $productAmountWithVat = $product->price + $productVat;
                    $orderTotal += $productAmountWithVat * $cartItem->quantity;
                }

                $orderGrandTotal = $orderTotal + $cartData->shipping_fee;

                $order = $this->orderRepository->create(
                    $payload->checkout_session_id,
                    $customer,
                    $orderNo,
                    $orderGrandTotal,
                    $cartData->shipping_id,
                    OrderStatus::Pending->value,
                    null
                );

                foreach ($cartItems as $cartItem) {
                    $product = $this->productRepository->findOneById($cartItem->product->id);
                    $this->orderDetailsRepository->create($product, $order, $cartItem->quantity);
                }

                $createPayment = $this->paymentRepository->createStripePayment($order->id, $checkOutSession);
                $paymentMethod = $this->paymentRepository->findStripe();
                $this->paymentDetailsRepository->create($createPayment->id, $paymentMethod->id, $payload->checkout_session_id);
                $customerAddress = $this->customerAddressRepository->findOneByCustomerId($payload->address_type, $customer->id);
                $this->shippingRepository->create($order->id, $customerAddress, $customer->mobile);
                $orderSummary = $this->orderService->generateOrderSummary($order);
                $orderData = $this->orderService->findOrderById($order->id);
                $this->cartRepository->deleteManyByCustomerId($customer->id);

                $data = (object) [
                    'summary' => (object) [
                        'subtotal' => $orderSummary['subtotal'],
                        'discount' => $orderSummary['discount'],
                        'shipping_method' => $orderSummary['shipping_method'],
                        'shipping_fee' => $orderSummary['shipping_fee'],
                        'vats' => $orderSummary['vats'],
                        'total_amount' => $orderSummary['total_amount'],
                    ],
                    'order' => new OrderResource($orderData)
                ];

                PaymentCompleteEvent::dispatch($order);

                SendOrderConfirmation::dispatch($customer->email, $order, $orderSummary['shipping_method'], $orderSummary['shipping_fee'], $store)
                    ->onQueue('sendemail');

                event(new OrderCreatedEvent($order));

                return new CheckPaymentSessionResource($data);
            } else {
                $this->errorRepository->saveError('Stripe Check Payment Session', 'Payment Unsuccessful');
                throw new InvalidPaymentException();
            }
        } catch (Throwable $e) {
            $this->errorRepository->saveError('Stripe Check Payment Session', $e->getMessage());
            throw $e;
        }
    }

    public function klarnaPaymentSession($payload, $store)
    {
        try {
            $klarnaData = $this->klarnaService->readOrder($payload->checkout_session_id);
            $paymentDetail = $this->paymentDetailsRepository->findOneByToken($payload->checkout_session_id);

            if ($paymentDetail) {
                $payment = $paymentDetail->payment;
                $orderId = $payment->order_id;
                $order = $this->salesRepository->findOneById($orderId);
                $orderSummary = $this->salesService->generateOrderSummary($order);

                $data = (object) [
                    'summary' => (object) [
                        'subtotal' => $orderSummary['subtotal'],
                        'discount' => $orderSummary['discount'],
                        'shipping_method' => $orderSummary['shipping_method'],
                        'shipping_fee' => $orderSummary['shipping_fee'],
                        'vats' => $orderSummary['vats'],
                        'total_amount' => $orderSummary['total_amount'],
                    ],
                    'order' => new OrderResource($order)
                ];

                return new CheckPaymentSessionResource($data);
            } else if ($klarnaData['status'] === 'checkout_complete') {
                $userId = auth()->user()->id;
                $customer = $this->customerRepository->findOneById($userId);
                $cartData = $this->cartService->findCarts($store);
                $cartItems = $cartData->cart;

                $dateTimeToday = date('Ymdhis');
                $orderNo = $dateTimeToday . '-' . Str::random(10);

                $orderTotal = 0;
                foreach ($cartItems as $cartItem) {
                    $product = $this->productRepository->findOneById($cartItem->product->id);
                    $vat = $this->vatRepository->findById($product->vat_id);
                    $productVat = $product->price * $vat->percentage;
                    $productAmountWithVat = $product->price + $productVat;
                    $orderTotal += $productAmountWithVat * $cartItem->quantity;
                }

                $orderGrandTotal = $orderTotal + $cartData->shipping_fee;

                $order = $this->orderRepository->create(
                    $payload->checkout_session_id,
                    $customer,
                    $orderNo,
                    $orderGrandTotal,
                    $cartData->shipping_id,
                    OrderStatus::Pending->value,
                    null
                );

                foreach ($cartItems as $cartItem) {
                    $product = $this->productRepository->findOneById($cartItem->product->id);
                    $this->orderDetailsRepository->create($product, $order, $cartItem->quantity);
                }

                $createPayment = $this->paymentRepository->createKlarnaPayment($order->id, $klarnaData);
                $paymentMethod = $this->paymentRepository->findKlarna();
                $this->paymentDetailsRepository->create($createPayment->id, $paymentMethod->id, $payload->checkout_session_id);
                $customerAddress = $this->customerAddressRepository->findOneByCustomerId($payload->address_type, $customer->id);
                $this->shippingRepository->create($order->id, $customerAddress, $customer->mobile);
                $this->cartRepository->deleteManyByCustomerId($customer->id);
                $orderData = $this->orderService->findOrderById($order->id);
                $orderSummary = $this->orderService->generateOrderSummary($order);

                $data = (object) [
                    'summary' => (object) [
                        'subtotal' => $orderSummary['subtotal'],
                        'discount' => $orderSummary['discount'],
                        'shipping_method' => $orderSummary['shipping_method'],
                        'shipping_fee' => $orderSummary['shipping_fee'],
                        'vats' => $orderSummary['vats'],
                        'total_amount' => $orderSummary['total_amount'],
                    ],
                    'order' => new OrderResource($orderData)
                ];

                PaymentCompleteEvent::dispatch($order);

                SendOrderConfirmation::dispatch($customer->email, $order, $orderSummary['shipping_method'], $orderSummary['shipping_fee'], $store)
                    ->onQueue('sendemail');

                event(new OrderCreatedEvent($order));

                return new CheckPaymentSessionResource($order);
            } else {
                $this->errorRepository->saveError('Stripe Check Payment Session', 'Payment Unsuccessful');
                throw new InvalidPaymentException();
            }
        } catch (Throwable  $e) {
            throw $e;
        }
    }
}
