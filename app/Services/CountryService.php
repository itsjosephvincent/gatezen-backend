<?php

namespace App\Services;

use App\Traits\SortingTraits;
use App\Http\Resources\CountryResource;
use App\Interfaces\Services\CountryServiceInterface;
use App\Interfaces\Repositories\CountryRepositoryInterface;

class CountryService implements CountryServiceInterface
{
    use SortingTraits;

    private $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries()
    {
        $sortField = 'name';
        $sortOrder = 'asc';


        $country = $this->countryRepository->getAllCountriesNoPagination($sortField, $sortOrder);
        return CountryResource::collection($country);
    }

    public function findCountries($store)
    {
        $sortField = 'name';
        $sortOrder = 'asc';

        $country = $this->countryRepository->findMany($store, $sortField, $sortOrder);
        return CountryResource::collection($country);
    }
}
