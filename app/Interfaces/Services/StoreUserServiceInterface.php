<?php

namespace App\Interfaces\Services;

interface StoreUserServiceInterface
{
    public function findUsers(object $payload);
    public function findStoreUsers(object $payload);
    public function findUser(int $userId);
    public function updateUser(object $payload, int $userId);
    public function updateUserPassword(object $payload, int $userId);
    public function disableUser2FA(int $userId);
}
