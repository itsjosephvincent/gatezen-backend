<?php

namespace App\Repositories;

use App\Interfaces\Repositories\StoreServerRepositoryInterface;
use App\Models\StoreServer;

class StoreServerRepository implements StoreServerRepositoryInterface
{
    public function create($storeId, $serverId)
    {
        $storeServer = StoreServer::where('server_id', $serverId)->orderBy('id', 'DESC')->first();
        $newStoreServerPort = 3000;
        if ($storeServer) {
            $newStoreServerPort = $storeServer->port + 1;
        }
        $newStoreSever = new StoreServer();
        $newStoreSever->store_id = $storeId;
        $newStoreSever->server_id = $serverId;
        $newStoreSever->port = $newStoreServerPort;
        $newStoreSever->save();
        return $newStoreSever->fresh();
    }

    public function findOneById($storeId)
    {
        return StoreServer::where('store_id', $storeId)->first();
    }
}
