<?php

namespace App\Interfaces\Repositories;

interface AdminRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function getAdmins();
    public function findOneById(int $adminId);
    public function findOneByEmail(string $email);
    public function create(object $payload, string $encryptedGoogleKey);
    public function update(object $payload, int $adminId);
    public function updateStatus(object $payload, int $adminId);
    public function updatePassword(object $payload, int $adminId);
    public function findAllCount();
}
