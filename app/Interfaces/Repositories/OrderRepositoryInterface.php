<?php

namespace App\Interfaces\Repositories;

interface OrderRepositoryInterface
{
    public function findCustomerSales(object $payload, int $customerId, string $sortField, string $sortOrder);
    public function findStoreSales(object $payload, int $storeId, string $sortField, string $sortOrder);
    public function create(int $checoutSessionId, object $customer, string $orderNo, $orderTotal, int $shippingMethodId, string $orderStatus, $discount);
    public function findStoreOdersCount(int $storeId);
    public function findOneById(int $orderId);
    public function findCustomerOrder(int $orderId);
}
