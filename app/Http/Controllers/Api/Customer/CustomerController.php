<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerPasswordUpdateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\CustomerStatusUpdateRequest;
use App\Interfaces\Services\CustomerServiceInterface;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->customerService->findCustomers($request)->response();
    }

    public function getLoggedInCustomer(): JsonResponse
    {
        return $this->customerService->findLoggedInCustomer()->response();
    }

    public function showCustomerStoreAndAddress($customerId): JsonResponse
    {
        return $this->customerService->findStoreAddress($customerId)->response();
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

    public function updateCustomerStatus(CustomerStatusUpdateRequest $request, $customerId): JsonResponse
    {
        $payload = (object) $request->only([
            'is_active'
        ]);

        return $this->customerService->updateCustomerStatus($payload, $customerId)->response();
    }

    public function updateAccountDetails(CustomerPasswordUpdateRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'first_name',
            'last_name',
            'display_name',
            'email',
            'current_password',
            'password'
        ]);

        return $this->customerService->updateCustomerDetails($payload)->response();
    }
}
