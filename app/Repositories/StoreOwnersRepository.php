<?php

namespace App\Repositories;

use App\Exceptions\Store\StoreExistsException;
use App\Interfaces\Repositories\StoreOwnersRepositoryInterface;
use App\Models\StoreUser;

class StoreOwnersRepository implements StoreOwnersRepositoryInterface
{
    public function create($storeId)
    {
        $currentUserId = auth()->user()->id;

        $storeOwner = StoreUser::where('user_id', $currentUserId)->where('store_id')->first();

        if ($storeOwner) {
            throw new StoreExistsException();
        }
        $storeUser = new StoreUser();
        $storeUser->user_id = $currentUserId;
        $storeUser->store_id = $storeId;
        $storeUser->save();
        return $storeUser->fresh();
    }

    public function findStoresByUserId($userId)
    {
        return StoreUser::where('user_id', $userId)->groupBy('store_id')->pluck('store_id');
    }

    public function findStoreOwnerByStoreId($storeId)
    {
        return StoreUser::where('store_id', $storeId)->first();
    }

    public function findStoreCountByUserId($userId)
    {
        return StoreUser::where('user_id', $userId)->groupBy('store_id')->pluck('store_id')->count();
    }
}
