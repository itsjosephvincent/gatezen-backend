<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'amount',
    ];

    /**
     * Get the order the detail belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product attached to the order detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function vat()
    {
        return $this->belongsTo(Vat::class);
    }
}
