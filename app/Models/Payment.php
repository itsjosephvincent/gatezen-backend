<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'amount',
        'status',
        'reference',
        'notes',
        'payment_method',
        'paid_at',
    ];

    /**
     * Get the order the payment is made for.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * A payment has one payment details.
     *
     * @return HasOne payment details
     */
    public function payment_details()
    {
        return $this->hasOne(PaymentDetail::class);
    }
}
