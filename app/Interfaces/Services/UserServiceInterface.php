<?php

namespace App\Interfaces\Services;

interface UserServiceInterface
{
    public function findUsers(object $payload);
    public function createUserFromTgiRegister(array $payload);
    public function createUserFromTgiLogin(array $payload);
    public function findUserBalance(array $payload);
    public function findTgiUser(array $payload);
    public function findUser(int $userId);
    public function findStoresByStoreOwner(object $payload, int $userId);
    public function updateUser(array $payload, int $userId);
    public function updateUserStatus(object $payload, int $userId);
    public function updateUserPassword(object $payload, int $userId);
    public function updateUserImage(object $payload, int $userId);
    public function disableUser2FAStatusData(int $userId);
}
