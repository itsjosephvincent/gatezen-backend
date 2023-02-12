<?php

namespace App\Interfaces\Repositories;

use App\Models\CustomerAddress;

interface CustomerAddressRepositoryInterface
{
    public function findMany(object $payload, string $sortField,  string $sortOrder);
    public function findManyByLoggedInCustomer(object $payload, string $sortField, string $sortOrder);
    public function create(object $payload);
    public function findOneById(int $customerAddressId);
    public function findOneByCustomerId(string $addressType, int $customerId);
    public function update(object $payload, int $customerAddressId);
}
