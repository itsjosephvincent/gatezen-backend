<?php

namespace App\Interfaces\Services;

interface AdminServiceInterface
{
    public function findAdmins(object $payload);
    public function findAdmin(int $adminId);
    public function createAdmin(object $payload);
    public function updateAdmin(object $payload, int $adminId);
    public function updateAdminStatus(object $payload, int $adminId);
    public function updateAdminPassword(object $payload, int $adminId);
}
