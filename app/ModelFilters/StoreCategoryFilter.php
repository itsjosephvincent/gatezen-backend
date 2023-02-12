<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class StoreCategoryFilter extends ModelFilter
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

    public function status($status)
    {
        if (strtolower($status) === 'active') {
            return $this->where('is_active', true);
        } else if (strtolower($status) === 'inactive') {
            return  $this->where('is_active', false);
        } else {
            return $this->where('is_active', null);
        }
    }
}
