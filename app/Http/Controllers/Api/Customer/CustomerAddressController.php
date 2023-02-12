<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerAddressRequest;
use App\Http\Requests\CustomerAddressUpdateRequest;
use App\Interfaces\Services\CustomerAddressServiceInterface;
use Illuminate\Http\JsonResponse;

class CustomerAddressController extends Controller
{
    private $customerAddressService;

    public function __construct(CustomerAddressServiceInterface $customerAddressService)
    {
        $this->customerAddressService = $customerAddressService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->customerAddressService->findLoggedInCustomerAddresses($request)->response();
    }

    public function store(CustomerAddressRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'address_type',
            'care_of',
            'address_1',
            'address_2',
            'city',
            'state',
            'postal_code',
            'country_id',
            'delivery_notes',
        ]);

        return $this->customerAddressService->createCustomerAddress($payload)->response();
    }

    public function show($customerAddressId): JsonResponse
    {
        return $this->customerAddressService->findCustomerAddress($customerAddressId)->response();
    }

    public function update(CustomerAddressUpdateRequest $request, $customerId): JsonResponse
    {
        $payload = (object) $request->only([
            'address_type',
            'care_of',
            'address_1',
            'address_2',
            'city',
            'state',
            'postal_code',
            'country_id',
            'delivery_notes'
        ]);

        return $this->customerAddressService->updateCustomerAddress($payload, $customerId)->response();
    }
}
