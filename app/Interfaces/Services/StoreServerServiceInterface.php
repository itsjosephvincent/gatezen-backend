<?php

namespace App\Interfaces\Services;

interface StoreServerServiceInterface
{
    public function createStoreServer(int $storeId, int $serverId);
}
