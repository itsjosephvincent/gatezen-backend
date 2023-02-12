<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
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
        return $this->where('name', 'LIKE', "$name%");
    }

    public function price($price)
    {
        return $this->where('price', $price);
    }

    public function retailPrice($retail_price)
    {
        return $this->where('retail_price', $retail_price);
    }

    public function wholesalePrice($wholesale_price)
    {
        return $this->where('wholesale_price', $wholesale_price);
    }

    public function status($status)
    {
        return $this->where('status', $status);
    }
}
