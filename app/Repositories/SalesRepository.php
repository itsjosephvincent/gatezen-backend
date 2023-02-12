<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Repositories\SalesRepositoryInterface;
use App\Models\StoreUser;

class SalesRepository implements SalesRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchStoreName = $payload->store_name;
        $searchCustomer = $payload->customer;
        $searchOwner = $payload->owner;
        return Order::with([
            'order_details',
            'store',
            'customer',
            'customer.owner',
            'shipping_method'
        ])->filter($payload->all())
            ->when($searchStoreName !== null, function ($query) use ($searchStoreName) {
                $query->whereHas(
                    'store',
                    function ($query) use ($searchStoreName) {
                        $query->where('store_name', 'like', $searchStoreName . '%');
                    }
                );
            })
            ->when($searchCustomer !== null, function ($query) use ($searchCustomer) {
                $query->whereHas(
                    'customer',
                    function ($query) use ($searchCustomer) {
                        $query->where('first_name', 'like', $searchCustomer . '%')
                            ->orWhere('last_name', 'like', $searchCustomer . '%');
                    }
                );
            })
            ->when($searchOwner !== null, function ($query) use ($searchOwner) {
                $query->whereHas(
                    'customer.owner',
                    function ($query) use ($searchOwner) {
                        $query->where('first_name', 'like', $searchOwner . '%')
                            ->orWhere('last_name', 'like', $searchOwner . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
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

    public function updateStatus($payload, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status = $payload->status;
        $order->save();

        return $order->fresh();
    }

    public function findOneByProductId($payload, $sortField, $sortOrder, $productId)
    {
        return OrderDetail::with([
            'order.customer',
            'order.store.store_owner.user'
        ])->where('product_id', $productId)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->get();
    }

    public function findManyUserSales($payload, $sortField, $sortOrder)
    {
        $user = auth()->user()->id;
        $storeIds = StoreUser::where('user_id', $user)->pluck('store_id');

        $searchCustomer = $payload->customer;
        $searchOwner = $payload->owner;

        return Order::with([
            'order_details.vat',
            'store',
            'customer',
            'customer.owner',
            'shipping_method'
        ])->whereIn('store_id', $storeIds)
            ->filter($payload->all())
            ->when($searchCustomer !== null, function ($query) use ($searchCustomer) {
                $query->whereHas(
                    'customer',
                    function ($query) use ($searchCustomer) {
                        $query->where('first_name', 'like', $searchCustomer . '%')
                            ->orWhere('last_name', 'like', $searchCustomer . '%');
                    }
                );
            })
            ->when($searchOwner !== null, function ($query) use ($searchOwner) {
                $query->whereHas(
                    'customer.owner',
                    function ($query) use ($searchOwner) {
                        $query->where('first_name', 'like', $searchOwner . '%')
                            ->orWhere('last_name', 'like', $searchOwner . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findManyMonthlySales()
    {
        return OrderDetail::whereYear('created_at', date('Y'))
            ->select(
                DB::raw('
                IFNULL(SUM(CASE MONTH(created_at) WHEN 1 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS January,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 2 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS February,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 3 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS March,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 4 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS April,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 5 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS May,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 6 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS June,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 7 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS July,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 8 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS August,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 9 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS September,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 10 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS October,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 11 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS November,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 12 THEN ((order_details.price * order_details.quantity) - order_details.discount ) END), 0) AS December
            ')
            )->first();
    }
}
