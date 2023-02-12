<?php

namespace App\Repositories;

use App\Models\Country;
use App\Interfaces\Repositories\CountryRepositoryInterface;
use App\Interfaces\Repositories\ShippingZoneRepositoryInterface;
use App\Models\ShippingZone;

class CountryRepository implements CountryRepositoryInterface
{
    private $shippingZoneRepository;

    public function __construct(ShippingZoneRepositoryInterface $shippingZoneRepository)
    {
        $this->shippingZoneRepository = $shippingZoneRepository;
    }

    public function getAllCountriesNoPagination($sortField, $sortOrder)
    {
        return Country::orderBy($sortField, $sortOrder)->get();
    }

    public function findMany($store, $sortField, $sortOrder)
    {
        $shippingZone = $this->shippingZoneRepository->findOneByStoreCategoryId($store->store_category->id);

        if (!$shippingZone) {
            return Country::orderBy($sortField, $sortOrder)->get();
        }

        return Country::whereIn('name', json_decode($shippingZone->countries))->orderBy($sortField, $sortOrder)->get();
    }

    public function findByName($country)
    {
        return Country::where('name', $country)->first();
    }
}
