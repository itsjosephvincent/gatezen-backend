<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface CountryServiceInterface
{
    public function getAllCountries();
    public function findCountries(Store $store);
}
