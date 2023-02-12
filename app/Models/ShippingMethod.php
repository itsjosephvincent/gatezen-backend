<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'key',
        'name',
        'min_order_amount',
        'shipping_fee'
    ];

    public function zone_methods()
    {
        return $this->hasMany(ShippingZoneMethod::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
