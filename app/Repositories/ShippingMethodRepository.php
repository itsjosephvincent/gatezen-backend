<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ShippingMethodRepositoryInterface;
use App\Models\ShippingMethod;

class ShippingMethodRepository implements ShippingMethodRepositoryInterface
{
    public function findOneById($shippingMethodId)
    {
        return ShippingMethod::findOrFail($shippingMethodId);
    }
}
