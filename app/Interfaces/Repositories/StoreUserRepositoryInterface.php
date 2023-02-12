<?php

namespace App\Interfaces\Repositories;

interface StoreUserRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findManyStoreUsers(object $payload, string $sortField, string $sortOrder);
    public function findOneById(int $userId);
    public function update(object $payload, int $userId);
    public function updatePassword(object $payload, int $userId);
    public function disableUser2FA(int $userId);
    public function findStoreUsersCount();
}
