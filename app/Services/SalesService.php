<?php

namespace App\Services;

use App\Enum\OrderStatus;
use App\Traits\SortingTraits;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\SalesViewResource;
use App\Interfaces\Repositories\CommissionRepositoryInterface;
use App\Interfaces\Repositories\OrderDetailsRepositoryInterface;
use App\Interfaces\Services\SalesServiceInterface;
use App\Interfaces\Repositories\SalesRepositoryInterface;
use App\Interfaces\Repositories\ShippingMethodRepositoryInterface;
use App\Interfaces\Repositories\StoreOwnersRepositoryInterface;
use App\Interfaces\Repositories\StoreUserRepositoryInterface;

class SalesService implements SalesServiceInterface
{
    use SortingTraits;

    private $salesRepository;
    private $orderDetailRepository;
    private $storeOwnerRepository;
    private $storeUserRepository;
    private $commissionRepository;
    private $shippingMethodRepository;

    public function __construct(
        SalesRepositoryInterface $salesRepository,
        OrderDetailsRepositoryInterface $orderDetailRepository,
        StoreOwnersRepositoryInterface $storeOwnerRepository,
        StoreUserRepositoryInterface $storeUserRepository,
        CommissionRepositoryInterface $commissionRepository,
        ShippingMethodRepositoryInterface $shippingMethodRepository
    ) {
        $this->salesRepository = $salesRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->storeOwnerRepository = $storeOwnerRepository;
        $this->storeUserRepository = $storeUserRepository;
        $this->commissionRepository = $commissionRepository;
        $this->shippingMethodRepository = $shippingMethodRepository;
    }

    public function findSales($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'desc');

        $orders = $this->salesRepository->findMany($payload, $sortField, $sortOrder);

        return OrderResource::collection($orders);
    }

    public function findSale($orderId)
    {
        $order = $this->salesRepository->findOneById($orderId);
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

    public function updateOrderStatus($payload)
    {
        $orderIds = (array) $payload->order_id;

        if ($payload->status == OrderStatus::Delivered->value) {
            for ($i = 0; $i < count($orderIds); $i++) {
                $this->salesRepository->updateStatus($payload, $orderIds[$i]);

                $orderDetails = $this->orderDetailRepository->findByOrderId($orderIds[$i]);
                $order = $this->salesRepository->findOneById($orderIds[$i]);
                $storeOwner = $this->storeOwnerRepository->findStoreOwnerByStoreId($order->store_id);
                $user = $this->storeUserRepository->findOneById($storeOwner->user_id);

                if ($order->store->store_category_id == 10) {
                    foreach ($orderDetails as $orderDetail) {
                        $commission = $this->commissionRepository->findOneByOrderDetailId($orderDetail->id);
                        if (!$commission) {
                            $subtotal = $orderDetail->price * $orderDetail->quantity;
                            $discount = $subtotal * 0.20;
                            $total = $subtotal - $discount;
                            $this->commissionRepository->create($orderDetail->id, $total, $user);
                        }
                    }
                } else {
                    foreach ($orderDetails as $orderDetail) {
                        $commission = $this->commissionRepository->findOneByOrderDetailId($orderDetail->id);
                        if (!$commission) {
                            $subtotal = $orderDetail->price * $orderDetail->quantity;
                            $this->commissionRepository->create($orderDetail->id, $subtotal, $user);
                        }
                    }
                }
            }

            return true;
        } else {
            for ($i = 0; $i < count($orderIds); $i++) {
                $this->salesRepository->updateStatus($payload, $orderIds[$i]);
            }

            return true;
        }
    }

    public function findProductSales($payload, $productId)
    {
        $sortField = $this->sortField($payload, 'name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $productSales = $this->salesRepository->findOneByProductId($payload, $sortField, $sortOrder, $productId);
        if (!$productSales) {
            return 'bopangk';
        } else {
            return OrderDetailResource::collection($productSales);
        }
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

    public function findUserSales($payload)
    {
        $sortField = $this->sortField($payload, 'number');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $order = $this->salesRepository->findManyUserSales($payload, $sortField, $sortOrder);
        return OrderResource::collection($order);
    }
}
