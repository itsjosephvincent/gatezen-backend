<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CommissionFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function salesAmount($sales_amount)
    {
        return $this->where('sales_amount', $sales_amount);
    }

    public function amount($amount)
    {
        return $this->where('amount',  $amount);
    }
}
