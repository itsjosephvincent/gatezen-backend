<?php

namespace App\Services;

use App\Http\Resources\CartItemListResource;
use App\Http\Resources\CartResource;
use App\Interfaces\Repositories\CartRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\ShippingZoneRepositoryInterface;
use App\Interfaces\Services\CartServiceInterface;
use App\Models\Product;
use App\Traits\SortingTraits;
use Illuminate\Support\Facades\Log;

class CartService implements CartServiceInterface
{
    use SortingTraits;

    private $cartRepository;
    private $productRepository;
    private $shippingZoneRepository;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        ProductRepositoryInterface $productRepository,
        ShippingZoneRepositoryInterface $shippingZoneRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->shippingZoneRepository = $shippingZoneRepository;
    }

    public function findCarts($store)
    {
        $sortField = 'product_id';
        $sortOrder = 'asc';
        $cartData = $this->cartRepository->findMany($sortField, $sortOrder);
        $subtotal = 0;
        $totalDiscount = 0;
        $vatPercentages = [];
        $totalAmount = 0;
        $shippingZone = $this->shippingZoneRepository->findOneByStoreCategoryId($store->store_category_id);

        foreach ($cartData as $cart) {
            $product = Product::with(['vat'])->findOrFail($cart->product_id);

            $discount = round(($product->price * $cart->quantity) * ($cart->discount / 100), 2);
            $productSubTotal = round($product->price * $cart->quantity, 2) - $discount;
            $subtotal += $productSubTotal;
            $totalDiscount += $discount;

            $vatPercentageLabel = 'VAT ' . round($product->vat->percentage * 100, 2) . '%';
            if ($vatPercentageLabel != 'VAT 0%') {
                if (!array_key_exists($vatPercentageLabel, $vatPercentages)) {
                    // percentage doesn't exist on taxesPercentages array. Push new percentage array.
                    $vatPercentages[$vatPercentageLabel] = round($productSubTotal * $product->vat->percentage, 2);
                } else {
                    // percentage existed on taxesPercentages array. Update value.
                    $vatPercentages[$vatPercentageLabel] = round(($vatPercentages[$vatPercentageLabel]) + ($productSubTotal * $product->vat->percentage), 2);
                }
            }

            $totalAmount += round($productSubTotal * $product->vat->percentage, 2);
        }

        $totalAmount += $subtotal;

        foreach ($shippingZone->zone_methods as $shipping) {
            if ($store->store_category_id == 10) {
                if ($shipping->shipping_method->min_order_amount > 0) {
                    if ($totalAmount < $shipping->shipping_method->min_order_amount) {
                        $discountAmount = $totalAmount * 0.20;
                        $total = $subtotal - $discountAmount;
                        $grandTotal = $total + $shippingZone->zone_methods[0]->shipping_method->shipping_fee;

                        $data = (object) [
                            'subtotal' => round($subtotal, 2),
                            'discount' => round($discountAmount, 2),
                            'shipping_id' => $shippingZone->zone_methods[0]->shipping_method->id,
                            'shipping_key' => $shippingZone->zone_methods[0]->shipping_method->key,
                            'shipping_method' => $shippingZone->zone_methods[0]->shipping_method->name,
                            'shipping_fee' => $shippingZone->zone_methods[0]->shipping_method->shipping_fee,
                            'vat' => $vatPercentages,
                            'total' => round($grandTotal, 2),
                            'cart' => $cartData
                        ];

                        return new CartItemListResource($data);
                    }

                    $discountAmount = $subtotal * 0.20;
                    $total = $totalAmount - $discountAmount;
                    $grandTotal = $total + $shippingZone->zone_methods[1]->shipping_method->shipping_fee;

                    $data = (object) [
                        'subtotal' => round($totalAmount, 2),
                        'discount' => round($discountAmount, 2),
                        'shipping_id' => $shippingZone->zone_methods[1]->shipping_method->id,
                        'shipping_key' => $shippingZone->zone_methods[1]->shipping_method->key,
                        'shipping_method' => $shippingZone->zone_methods[1]->shipping_method->name,
                        'shipping_fee' => $shippingZone->zone_methods[1]->shipping_method->shipping_fee,
                        'vat' => $vatPercentages,
                        'total' => round($grandTotal, 2),
                        'cart' => $cartData
                    ];

                    return new CartItemListResource($data);
                }
            } else if ($store->store_category_id == 4) {
                if ($shipping->shipping_method->min_order_amount > 0) {
                    if ($totalAmount < $shipping->shipping_method->min_order_amount) {
                        $grandTotal = $totalAmount + $shippingZone->zone_methods[0]->shipping_method->shipping_fee;

                        $data = (object) [
                            'subtotal' => round($totalAmount, 2),
                            'discount' => round($totalDiscount, 2),
                            'shipping_id' => $shippingZone->zone_methods[0]->shipping_method->id,
                            'shipping_key' => $shippingZone->zone_methods[0]->shipping_method->key,
                            'shipping_method' => $shippingZone->zone_methods[0]->shipping_method->name,
                            'shipping_fee' => $shippingZone->zone_methods[0]->shipping_method->shipping_fee,
                            'vat' => $vatPercentages,
                            'total' => round($grandTotal, 2),
                            'cart' => $cartData
                        ];

                        return new CartItemListResource($data);
                    }

                    $grandTotal = $totalAmount + $shippingZone->zone_methods[1]->shipping_method->shipping_fee;

                    $data = (object) [
                        'subtotal' => round($totalAmount, 2),
                        'discount' => round($totalDiscount, 2),
                        'shipping_id' => $shippingZone->zone_methods[1]->shipping_method->id,
                        'shipping_key' => $shippingZone->zone_methods[1]->shipping_method->key,
                        'shipping_method' => $shippingZone->zone_methods[1]->shipping_method->name,
                        'shipping_fee' => $shippingZone->zone_methods[1]->shipping_method->shipping_fee,
                        'vat' => $vatPercentages,
                        'total' => round($grandTotal, 2),
                        'cart' => $cartData
                    ];

                    return new CartItemListResource($data);
                }
            } else {
                $grandTotal = $totalAmount + $shippingZone->zone_methods[0]->shipping_method->shipping_fee;

                $data = (object) [
                    'subtotal' => round($totalAmount, 2),
                    'discount' => round($totalDiscount, 2),
                    'shipping_id' => $shippingZone->zone_methods[0]->shipping_method->id,
                    'shipping_key' => $shippingZone->zone_methods[0]->shipping_method->key,
                    'shipping_method' => $shippingZone->zone_methods[0]->shipping_method->name,
                    'shipping_fee' => $shippingZone->zone_methods[0]->shipping_method->shipping_fee,
                    'vat' => $vatPercentages,
                    'total' => round($grandTotal, 2),
                    'cart' => $cartData
                ];

                return new CartItemListResource($data);
            }
        }
    }

    public function createCart($payload)
    {
        $cart = $this->cartRepository->create($payload);
        return new CartResource($cart);
    }

    public function findCart($cartItemId)
    {
        $cart = $this->cartRepository->findOneById($cartItemId);
        return new CartResource($cart);
    }

    public function updateCart($payload, $cartItemId)
    {
        $cart = $this->cartRepository->update($payload, $cartItemId);
        return new CartResource($cart);
    }

    public function deleteCart($cartItemId, $store)
    {
        $this->cartRepository->deleteOneById($cartItemId);
        return $this->findCarts($store);
    }

    public function syncGuestItemsToCart($payload)
    {
        for ($i = 0; $i < count((array) $payload); $i++) {
            $cartItems = $payload[$i];
            if ($cartItems) {
                $product = $this->productRepository->findOneById($cartItems['product']['id']);
                if ($product) {
                    $this->cartRepository->syncGuestCartItems($cartItems['product']['id'], $cartItems['quantity']);
                }
            }
        }
        return true;
    }
}
