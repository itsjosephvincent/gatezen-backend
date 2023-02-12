<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\CustomerStatusUpdateRequest;
use App\Interfaces\Services\OrderServiceInterface;
use App\Http\Requests\CustomerAddressUpdateRequest;
use App\Http\Requests\CustomerPasswordUpdateRequest;
use App\Interfaces\Services\CustomerAddressServiceInterface;
use App\Interfaces\Services\CustomerServiceInterface;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    private $customerService;
    private $orderService;
    private $customerAddressService;

    public function __construct(
        CustomerServiceInterface $customerService,
        OrderServiceInterface $orderService,
        CustomerAddressServiceInterface $customerAddressService
    ) {
        $this->customerService = $customerService;
        $this->orderService = $orderService;
        $this->customerAddressService = $customerAddressService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->customerService->findByStoreUser($request)->response();
    }

    public function getStoreCustomers(Request $request, $storeId): JsonResponse
    {
        return $this->customerService->findByStoreId($request, $storeId)->response();
    }

    public function show($customerId): JsonResponse
    {
        return $this->customerService->findCustomer($customerId)->response();
    }

    public function getCustomerSales(Request $request, $customerId): JsonResponse
    {
        return $this->orderService->findCustomerOrders($request, $customerId)->response();
    }

    public function update(CustomerUpdateRequest $request, $customerId): JsonResponse
    {
        $payload = (object) $request->only([
            'first_name',
            'last_name',
            'email',
            'mobile'
        ]);

        return $this->customerService->updateCustomer($payload, $customerId)->response();
    }

    public function updateStatus(CustomerStatusUpdateRequest $request, $customerId): JsonResponse
    {
        $payload = (object) $request->only([
            'is_active'
        ]);

        return $this->customerService->updateCustomerStatus($payload, $customerId)->response();
    }

    public function updateAddress(CustomerAddressUpdateRequest $request, $customerId): JsonResponse
    {
        $payload = (object) $request->only([
            'address_type',
            'address_1',
            'city',
            'postal_code',
            'country_id'
        ]);

        return $this->customerAddressService->updateCustomerAddress($payload, $customerId)->response();
    }

    public function updatePassword(CustomerPasswordUpdateRequest $request, $customerId): JsonResponse
    {
        $payload = (object) $request->only([
            'password'
        ]);

        return $this->customerService->updateCustomerPassword($payload, $customerId)->response();
    }

    public function disable2FA($customerId): JsonResponse
    {
        return $this->customerService->disableGoogleTwoAuthData($customerId)->response();
    }
}
