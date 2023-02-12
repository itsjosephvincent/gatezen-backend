<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CustomerFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function name($name)
    {
        return $this->where(function ($q) use ($name) {
            return $q->where('first_name', 'LIKE', "%$name%")
                ->orWhere('last_name', 'LIKE', "%$name%");
        });
    }

    public function customerType($customerType)
    {
        return $this->where('customer_type', $customerType);
    }

    public function companyName($companyName)
    {
        return $this->where('company_name', $companyName);
    }

    public function businessNumber($businessNumber)
    {
        return $this->where('business_number', $businessNumber);
    }

    public function email($email)
    {
        return $this->where('email', $email);
    }

    public function isActive($isActive)
    {
        return $this->where('is_active', $isActive);
    }
}
