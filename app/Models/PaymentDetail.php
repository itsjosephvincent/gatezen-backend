<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payment_id',
        'payment_method_id',
        'payment_token',
        'notes'
    ];

    /**
     * Get the payment method attached to the payment detail.
     */
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the payment attached to the payment detail.
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
