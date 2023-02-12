<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductMediaFilter extends ModelFilter
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

    public function productId($productId)
    {
        return $this->where('product_id', $productId);
    }

    public function isFeatured($isFeatured)
    {
        return $this->where('is_featured', $isFeatured);
    }
}
