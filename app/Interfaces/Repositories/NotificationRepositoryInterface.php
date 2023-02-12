<?php

namespace App\Interfaces\Repositories;

interface NotificationRepositoryInterface
{
    public function findMany(string $sortField, string $sortOrder);
    public function update(string $notificationId);
    public function findAllCount();
}
