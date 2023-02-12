<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ShippingZoneRepositoryInterface;
use App\Models\ShippingZone;

class ShippingZoneRepository implements ShippingZoneRepositoryInterface
{
    public function findOneByStoreCategoryId($storeCategoryId)
    {
        return ShippingZone::with('zone_methods.shipping_method')->where('store_category_id', $storeCategoryId)->first();
    }
}
