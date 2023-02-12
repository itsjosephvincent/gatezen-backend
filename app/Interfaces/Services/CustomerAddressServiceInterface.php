<?php

namespace App\Interfaces\Services;

interface CustomerAddressServiceInterface
{
    public function findCustomerAddresses(object $payload);
    public function findLoggedInCustomerAddresses(object $payload);
    public function createCustomerAddress(object $payload);
    public function findCustomerAddress(int $customerAddressId);
    public function updateCustomerAddress(object $payload, int $customerId);
}
