<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class StoreUserFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function userId($userId)
    {
        return $this->where('user_id', $userId);
    }

    public function storeId($storeId)
    {
        return $this->where('store_id', $storeId);
    }
}
