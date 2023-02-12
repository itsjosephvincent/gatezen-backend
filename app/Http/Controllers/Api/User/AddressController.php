<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressStoreRequest;
use App\Interfaces\Services\AddressServiceInterface;
use App\Interfaces\Services\CountryServiceInterface;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{

    private $addressService;
    private $countryService;

    public function __construct(AddressServiceInterface $addressService, CountryServiceInterface $countryService)
    {
        $this->addressService = $addressService;
        $this->countryService = $countryService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->addressService->findAddresses($request)->response();
    }

    public function store(AddressStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'user_id',
            'care_of',
            'address_1',
            'address_2',
            'city',
            'postal_code',
            'country_id'
        ]);

        return $this->addressService->createAddress($payload)->response();
    }

    public function show($id): JsonResponse
    {
        return $this->addressService->findAddress($id)->response();
    }

    public function update(AddressStoreRequest $request, $id): JsonResponse
    {
        $payload = (object) $request->only([
            'user_id',
            'care_of',
            'address_1',
            'address_2',
            'city',
            'postal_code',
            'country_id'
        ]);

        return $this->addressService->updateAddress($payload, $id)->response();
    }

    public function getAllCountries(): JsonResponse
    {
        return $this->countryService->getAllCountries()->response();
    }
}
