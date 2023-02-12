<?php

namespace App\Interfaces\Repositories;

interface ShippingZoneRepositoryInterface
{
    public function findOneByStoreCategoryId(int $storeCategoryId);
}
