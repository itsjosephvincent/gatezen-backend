<?php

namespace App\Repositories;

use App\Models\Order;
use App\Interfaces\Repositories\OrderRepositoryInterface;
use Carbon\Carbon;

class OrderRepository implements OrderRepositoryInterface
{
    public function findCustomerSales($payload, $customerId, $sortField, $sortOrder)
    {
        return Order::with('order_details')
            ->where('customer_id', $customerId)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findStoreSales($payload, $storeId, $sortField, $sortOrder)
    {
        return Order::with([
            'customer',
            'order_details.product',
            'order_details.product.medias',
        ])->where('store_id', $storeId)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function create($checoutSessionId, $customer, $orderNo, $orderTotal, $shippingMethodId, $orderStatus, $discount)
    {
        $discountValue = 0.00;

        if ($discount != null) {
            $discountValue = $discount;
        }

        $order = new Order();
        $order->customer_id = $customer->id;
        $order->store_id = $customer->store_id;
        $order->shipping_method_id = $shippingMethodId;
        $order->status = $orderStatus;
        $order->number = $orderNo;
        $order->date = Carbon::now();
        $order->order_total = $orderTotal;
        $order->reference = $checoutSessionId;
        $order->discount = $discountValue;
        $order->save();
        return $order->fresh();
    }

    public function findStoreOdersCount($storeId)
    {
        return Order::whereIn('store_id', $storeId)->count();
    }

    public function findOneById($orderId)
    {
        return Order::with([
            'order_details.product.medias',
            'order_details.vat',
            'customer.addresses',
            'customer.owner',
            'store',
            'shipping_address',
            'shipping_address.country',
            'payment',
            'payment.payment_details',
            'payment.payment_details.payment_method',
            'shipping_method'
        ])->findOrFail($orderId);
    }

    public function findCustomerOrder($orderId)
    {
        return Order::with([
            'order_details.product',
            'order_details.vat',
            'shipping_address',
            'shipping_address.country',
            'payment',
            'payment.payment_details',
            'payment.payment_details.payment_method',
        ])->findOrFail($orderId);
    }
}
