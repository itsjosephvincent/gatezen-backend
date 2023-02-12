<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class StoreFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function storeName($storeName)
    {
        return $this->where('store_name', 'LIKE', "$storeName%");
    }

    public function status($status)
    {
        return $this->where('status', $status);
    }

    public function storeUrl($store_url)
    {
        return $this->where('url', $store_url);
    }
}
