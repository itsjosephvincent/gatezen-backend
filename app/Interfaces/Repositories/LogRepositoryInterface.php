<?php

namespace App\Interfaces\Repositories;

interface LogRepositoryInterface
{
    public function findMany(string $sortField, string $sortOrder);
    public function findOneByUser(string $sortField, string $sortOrder);
    public function findOneByStore(string $sortField, string $sortOrder, int $storeId);
}
