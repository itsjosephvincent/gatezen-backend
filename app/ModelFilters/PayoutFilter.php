<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class PayoutFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function status($status)
    {
        return $this->where('payout_status', $status);
    }

    public function reference($reference)
    {
        return $this->where('reference', $reference);
    }

    public function amount($amount)
    {
        return $this->where('amount', $amount);
    }
}
