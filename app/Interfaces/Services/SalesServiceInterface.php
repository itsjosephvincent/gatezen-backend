<?php

namespace App\Interfaces\Services;

interface SalesServiceInterface
{
    public function findSales(object $payload);
    public function findSale(int $orderId);
    public function updateOrderStatus(object $payload);
    public function findProductSales(object $payload, int $productId);
    public function findUserSales(object $payload);
}
