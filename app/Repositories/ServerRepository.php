<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ServerRepositoryInterface;
use App\Models\Server;

class ServerRepository implements ServerRepositoryInterface
{
    public function findMany()
    {
        return Server::orderBy('id', 'DESC')->first();
    }
}
