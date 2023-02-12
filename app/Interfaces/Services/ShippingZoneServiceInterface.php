<?php

namespace App\Interfaces\Services;

interface ShippingZoneServiceInterface
{
    public function findByStoreCategoryId(int $storeCategoryId);
}
