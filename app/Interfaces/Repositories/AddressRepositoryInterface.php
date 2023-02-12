<?php

namespace App\Interfaces\Repositories;

interface AddressRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findOneById(int $addressId);
    public function create(object $payload);
    public function createAddressFromTgiRegister(array $payload, int $userId, int $countryId);
    public function createAddressFromTgiLogin(array $payload, int $userId, int $countryId);
    public function update(object $payload, int $addressId);
    public function updateAddressFromTgiLogin(array $payload, int $userId, int $countryId);
    public function updateAddressFromTgiRegister(array $payload, int $userId, int $countryId);
}
