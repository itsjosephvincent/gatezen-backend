<?php

namespace App\Repositories;

use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Repositories\OrderDetailsRepositoryInterface;

class OrderDetailsRepository implements OrderDetailsRepositoryInterface
{
    public function create($product, $order, $cartItemQuantity)
    {
        $createOrderDetails = new OrderDetail();
        $createOrderDetails->order_id = $order->id;
        $createOrderDetails->product_id = $product->id;
        $createOrderDetails->name = $product->name;
        $createOrderDetails->description = $product->description;
        $createOrderDetails->quantity = $cartItemQuantity;
        $createOrderDetails->price = $product->price;
        $createOrderDetails->discount = 0;
        $createOrderDetails->vat_id = $product->vat_id;
        $createOrderDetails->save();
        return $createOrderDetails->fresh();
    }

    public function findByOrderId($orderId)
    {
        return OrderDetail::where('order_id', $orderId)->get();
    }

    public function findMonthlySales($storeId)
    {
        return OrderDetail::whereYear('created_at', date('Y'))->whereHas('order', function ($query) use ($storeId) {
            return $query->whereIn('store_id', $storeId);
        })->select(
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
