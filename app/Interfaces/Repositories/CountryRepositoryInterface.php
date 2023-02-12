<?php

namespace App\Interfaces\Repositories;

use App\Models\Store;

interface CountryRepositoryInterface
{
    public function getAllCountriesNoPagination(string $sortField, string $sortOrder);
    public function findMany(Store $store, string $sortField, string $sortOrder);
    public function findByName(string $country);
}
