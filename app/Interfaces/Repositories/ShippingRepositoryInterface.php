<?php

namespace App\Interfaces\Repositories;

interface ShippingRepositoryInterface
{
    public function create(int $createOrderId, object $customerAddress, string $customerMobile);
}
