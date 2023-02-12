<?php

namespace App\Interfaces\Repositories;

interface StoreOwnersRepositoryInterface
{
    public function create(int $storeId);
    public function findStoresByUserId(int $userId);
    public function findStoreOwnerByStoreId(int $storeId);
    public function findStoreCountByUserId(int $userId);
}
