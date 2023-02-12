<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\CountryServiceInterface;
use App\Models\Store;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    private $countryService;

    public function __construct(CountryServiceInterface $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index(Store $store): JsonResponse
    {
        return $this->countryService->findCountries($store)->response();
    }
}
