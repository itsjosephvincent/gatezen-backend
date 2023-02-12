<?php

namespace App\Services;

use App\Models\Store;

class StoreManager
{
    private $store;

    public function setStore(?Store $store)
    {
        $this->store = $store;
        return $this;
    }

    public function getStore(): ?Store
    {
        return $this->store;
    }

    public function loadStore($identifier): bool
    {
        $store = Store::with([
            'store_owner',
            'store_category'
        ])->where('domain', $identifier)->first();

        if ($store) {
            $this->setStore($store);
            return true;
        }

        return false;
    }
}
