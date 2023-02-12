<?php

namespace App\Models;

use App\Enum\OrderStatus;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'customer_id',
        'store_id',
        'shipping_method_id',
        'status',
        'number',
        'date',
        'order_total',
        'confirmed_date',
        'reference',
        'note',
    ];

    protected $cast = ['status' => OrderStatus::class];

    /**
     * A order has many items.
     *
     * @return HasMany order details
     */
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * An order belongs to a customer.
     *
     * @return BelongsTo the attached customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * An order has one payment.
     *
     * @return HasOne payment
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * An order has one shipping address.
     *
     * @return HasOne shipping address
     */
    public function shipping_address()
    {
        return $this->hasOne(Shipping::class);
    }

    public function shipping_method()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    /**
     * An order has one tracking details.
     *
     * @return HasOne tracking details
     */
    public function tracking()
    {
        return $this->hasOne(OrderTracking::class);
    }

    /**
     * An order belongs to a store.
     *
     * @return BelongsTo the attached store
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
