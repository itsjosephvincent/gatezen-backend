<?php

namespace App\Interfaces\Repositories;

interface ShippingMethodRepositoryInterface
{
    public function findOneById(int $shippingMethodId);
}
