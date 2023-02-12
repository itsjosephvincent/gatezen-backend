<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserBankDetailFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function accountNumber($accountNumber)
    {
        return $this->where('account_number', 'LIKE', "%$accountNumber%");
    }

    public function accountName($accoutnName)
    {
        return $this->where('account_name', 'LIKE', "%$accoutnName%");
    }

    public function bankName($bankName)
    {
        return $this->where('bank_name', 'LIKE', "%$bankName%");
    }

    public function bankSwiftCode($bankSwiftCode)
    {
        return $this->where('bank_swift_code', 'LIKE', "%$bankSwiftCode%");
    }
}
