<?php

namespace App\Interfaces\Repositories;

use App\Models\Store;

interface CustomerRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findOneById(int $customerId);
    public function findOneByEmail(string $email);
    public function findCustomerStoreAndAddress(int $customerId);
    public function create(object $payload, Store $store);
    public function findOneByStoreUser(object $payload, string $sortField, string $sortOrder);
    public function findOneByStoreId(object $payload, int $storeId, string $sortField, string $sortOrder);
    public function update(object $payload, int $customerId);
    public function updateStatus(object $payload, int $customerId);
    public function updatePassword(object $payload, int $customerId);
    public function disableGoogleTwoAuth(int $customerId);
    public function findStoreCustomersCount(int $storeId);
}
