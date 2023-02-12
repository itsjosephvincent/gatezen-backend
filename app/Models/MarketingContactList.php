<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketingContactList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'store_id',
        'provider',
        'channel',
        'name',
        'list_id',
        'type',
        'store_category_id'
    ];
}
