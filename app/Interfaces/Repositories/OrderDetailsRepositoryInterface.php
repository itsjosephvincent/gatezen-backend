<?php

namespace App\Interfaces\Repositories;

use App\Models\Order;

interface OrderDetailsRepositoryInterface
{
    public function create(object $product, Order $order, int $cartItemQuantity);
    public function findMonthlySales(int $storeId);
    public function findByOrderId(int $orderId);
}
