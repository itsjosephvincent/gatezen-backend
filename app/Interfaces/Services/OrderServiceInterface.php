<?php

namespace App\Interfaces\Services;

use App\Models\Order;

interface OrderServiceInterface
{
    public function findOrders(object $payload, int $customerId);
    public function findStoreOrders(object $payload, int $storeId);
    public function generateOrderSummary(object $order);
    public function findCustomerOrders(object $payload);
    public function findOrderWithSummary(int $orderId);
    public function findOrderById(int $orderId);
}
