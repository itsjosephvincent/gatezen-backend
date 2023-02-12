<?php

namespace App\Interfaces\Repositories;

interface TheGateIndexRepositoryInterface
{
    public function findUser(array $payload);
    public function createUser(array $payload, int $userId);
    public function updateUser(array $payload, int $userId);
}
