<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Cart extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "Cart has been {$eventName}")
            ->useLogName('Cart')
            ->logOnly([
                'customer_id',
                'product_id',
                'quantity',
            ])
            ->logOnlyDirty();
    }

    /**
     * Get the customer that owns the cart.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the product that belongs to the cart.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
