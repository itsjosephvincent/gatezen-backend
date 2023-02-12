<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingZone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'store_category_id',
        'countries',
    ];

    public function zone_methods()
    {
        return $this->hasMany(ShippingZoneMethod::class);
    }
}
