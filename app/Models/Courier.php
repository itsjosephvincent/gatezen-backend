<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_no',
    ];

    /**
     * A courier has many orders to deliver.
     *
     * @return HasMany order details
     */
    public function order_tracking()
    {
        return $this->hasMany(OrderTracking::class);
    }
}
