<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PaymentMethodRepositoryInterface;
use App\Models\PaymentMethod;

class PaymentMethodRepository implements PaymentMethodRepositoryInterface
{
    public function findMany($sortField, $sortOrder)
    {
        return PaymentMethod::where('is_active', 1)->orderBy($sortField, $sortOrder)->get();
    }
}
