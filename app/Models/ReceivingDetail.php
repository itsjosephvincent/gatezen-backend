<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceivingDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'receiving_id',
        'product_id',
        'supplier_id',
    ];

    /**
     * Get the receiving the detail belongs to.
     */
    public function receiving()
    {
        return $this->belongsTo(Receiving::class);
    }

    /**
     * Get the product attached to the detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the supplier attached to the item.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
