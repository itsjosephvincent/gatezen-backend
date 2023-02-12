<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status',
        'tracking_no',
        'description',
        'amount',
        'courier_id',
    ];

    /**
     * Get the order the tracking belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the courier assigned for the shipping.
     */
    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}
