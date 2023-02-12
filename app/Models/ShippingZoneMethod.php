<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingZoneMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shipping_zone_id',
        'shipping_method_id'
    ];

    public function shipping_zone()
    {
        return $this->belongsTo(ShippingZone::class);
    }

    public function shipping_method()
    {
        return $this->belongsTo(ShippingMethod::class);
    }
}
