<?php

namespace App\Interfaces\Repositories;

interface StoreServerRepositoryInterface
{
    public function create(int $storeId, int $storeServer);
    public function findOneById(int $storeId);
}
