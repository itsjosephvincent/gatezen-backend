<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface CustomerServiceInterface
{
    public function findCustomers(object $payload);
    public function findLoggedInCustomer();
    public function findCustomer(int $customerId);
    public function findStoreAddress(int $customerId);
    public function createCustomer(object $payload, Store $store);
    public function findByStoreUser(object $payload);
    public function findByStoreId(object $payload, int $storeId);
    public function updateCustomer(object $payload, int $customerId);
    public function updateCustomerStatus(object $payload, int $customerId);
    public function updateCustomerPassword(object $payload, int $customerId);
    public function disableGoogleTwoAuthData(int $customerId);
    public function updateCustomerDetails(object $payload);
}
