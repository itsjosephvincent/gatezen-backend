<?php

namespace App\Services;

use App\Http\Resources\OrderResource;
use App\Http\Resources\SalesViewResource;
use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Repositories\ShippingMethodRepositoryInterface;
use App\Interfaces\Services\OrderServiceInterface;
use App\Traits\SortingTraits;

class OrderService implements OrderServiceInterface
{
    use SortingTraits;

    private $orderRepository;
    private $shippingMethodRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ShippingMethodRepositoryInterface $shippingMethodRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->shippingMethodRepository = $shippingMethodRepository;
    }

    public function findOrders($payload, $customerId)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $orderList = $this->orderRepository->findCustomerSales($payload, $customerId, $sortField, $sortOrder);
        return OrderResource::collection($orderList);
    }

    public function findCustomerOrders($payload)
    {
        $customerId = auth()->user()->id;
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $orderList = $this->orderRepository->findCustomerSales($payload, $customerId, $sortField, $sortOrder);
        return OrderResource::collection($orderList);
    }

    public function findOrderWithSummary($orderId)
    {
        $order = $this->orderRepository->findOneById($orderId);
        $orderSummary = $this->generateOrderSummary($order);

        $data = (object) [
            'order_details' => new OrderResource($order),
            'summary' => (object) [
                'subtotal' => $orderSummary['subtotal'],
                'discount' => $orderSummary['discount'],
                'vats' => $orderSummary['vats'],
                'shipping_method' => $orderSummary['shipping_method'],
                'shipping_fee' => $orderSummary['shipping_fee'],
                'total_amount' => $orderSummary['total_amount'],
            ]
        ];

        return new SalesViewResource($data);
    }

    public function findOrderById($orderId)
    {
        $order = $this->orderRepository->findOneById($orderId);

        return new OrderResource($order);
    }

    public function findStoreOrders($payload, $storeId)
    {
        $sortField = $this->sortField($payload, 'number');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $order = $this->orderRepository->findStoreSales($payload, $storeId, $sortField, $sortOrder);
        return OrderResource::collection($order);
    }

    public function generateOrderSummary($order)
    {
        $subTotal = 0;
        $totalDiscount = 0;
        $vatPercentages = [];
        $totalAmount = 0;
        $shipping = $this->shippingMethodRepository->findOneById($order->shipping_method_id);

        foreach ($order->order_details as $order_detail) {
            $discount = round(($order_detail->price * $order_detail->quantity) * ($order_detail->discount / 100), 2);
            $orderDetailSubtotal = round($order_detail->price * $order_detail->quantity, 2) - $discount;
            $subTotal += $orderDetailSubtotal;
            $totalDiscount += $discount;

            $vatPercentageLabel = 'VAT ' . round($order_detail->vat->percentage * 100, 2) . '%';
            if (!array_key_exists($vatPercentageLabel, $vatPercentages)) {
                // percentage doesn't exist on taxesPercentages array. Push new percentage array.
                $vatPercentages[$vatPercentageLabel] = round($orderDetailSubtotal * $order_detail->vat->percentage, 2);
            } else {
                // percentage existed on taxesPercentages array. Update value.
                $vatPercentages[$vatPercentageLabel] = round(($vatPercentages[$vatPercentageLabel]) + ($orderDetailSubtotal * $order_detail->vat->percentage), 2);
            }
            $totalAmount += round($orderDetailSubtotal * $order_detail->vat->percentage, 2);
        }

        $totalAmount += $subTotal;

        if ($order->store->store_category_id == 10) {

            $discountAmount = $totalAmount * 0.20;
            $total = $totalAmount - $discountAmount;
            $grandTotal = $total + $shipping->shipping_fee;

            return [
                'subtotal' => round($totalAmount, 2),
                'discount' => round($discountAmount, 2),
                'shipping_method' => $shipping->name,
                'shipping_fee' => $shipping->shipping_fee,
                'vats' => $vatPercentages,
                'total_amount' => round($grandTotal, 2),
            ];
        } else {

            $grandTotal = $totalAmount + $shipping->shipping_fee;

            return [
                'subtotal' => round($totalAmount, 2),
                'discount' => round($totalDiscount, 2),
                'shipping_method' => $shipping->name,
                'shipping_fee' => $shipping->shipping_fee,
                'vats' => $vatPercentages,
                'total_amount' => round($grandTotal, 2),
            ];
        }
    }
}
