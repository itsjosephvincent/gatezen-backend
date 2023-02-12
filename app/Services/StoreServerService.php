<?php

namespace App\Services;

use App\Http\Resources\StoreServerResource;
use App\Interfaces\Repositories\StoreServerRepositoryInterface;
use App\Interfaces\Services\StoreServerServiceInterface;

class StoreServerService implements StoreServerServiceInterface
{
    private $storeServerRepository;

    public function __construct(StoreServerRepositoryInterface $storeServerRepository)
    {
        $this->storeServerRepository = $storeServerRepository;
    }

    public function createStoreServer($storeId, $serverId)
    {
        $storeServer = $this->storeServerRepository->create($storeId, $serverId);
        return new StoreServerResource($storeServer);
    }
}
