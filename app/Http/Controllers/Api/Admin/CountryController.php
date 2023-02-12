<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\CountryServiceInterface;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    private $countryService;

    public function __construct(CountryServiceInterface $countryService)
    {
        $this->countryService = $countryService;
    }

    public function getAllCountries(): JsonResponse
    {
        return $this->countryService->getAllCountries()->response();
    }
}
