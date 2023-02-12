<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class OrderFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function orderNumber($orderNumber)
    {
        return $this->where('number', 'LIKE', "%$orderNumber%");
    }

    public function status($status)
    {
        return $this->where('status', str_replace(" ", "_", $status));
    }

    public function date($date)
    {
        return $this->where('date', $date);
    }

    public function confirmedDate($confirmedDate)
    {
        return $this->where('confirmed_date', $confirmedDate);
    }
}
