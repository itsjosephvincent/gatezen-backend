<?php

namespace App\Services;

use App\Http\Resources\StoreUserResource;
use App\Interfaces\Repositories\StoreOwnersRepositoryInterface;
use App\Interfaces\Services\StoreOwnersServiceInterface;

class StoreOwnersService implements StoreOwnersServiceInterface
{
    private $storeOwnersRepository;

    public function __construct(StoreOwnersRepositoryInterface $storeOwnersRepository)
    {
        $this->storeOwnersRepository = $storeOwnersRepository;
    }

    public function createStoreUser($storeId)
    {
        $storeOwner = $this->storeOwnersRepository->create($storeId);
        return new StoreUserResource($storeOwner);
    }
}
