<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'server_id',
        'port'
    ];
}
