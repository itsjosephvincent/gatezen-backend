<?php

namespace App\Interfaces\Repositories;

interface UserBankDetailsRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findManyList(object $payload, string $sortField, string $sortOrder);
    public function findOneById(int $userBankDetailsId);
    public function create(object $payload);
    public function update(object $payload, int $userBankDetailsId);
    public function delete(int $userBankDetailsId);
}
