<?php

namespace App\Interfaces\Repositories;

interface UserRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function create(array $payload);
    public function findOneById(int $userId);
    public function findOneByEmail(string $email);
    public function findStoresByStoreOwnerId(object $payload, int $userId, string $sortField, string $sortOrder);
    public function update(object $payload, int $userId);
    public function updateStatus(object $payload, int $userId);
    public function updatePassword(object $payload, int $userId);
    public function updateImage(object $payload, int $userId);
    public function disable2FAStatus(int $userId);
}
