<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockOutDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'stock_out_id',
        'product_id',
        'quantity',
    ];

    /**
     * Get the stockout the detail belongs to.
     */
    public function stockout()
    {
        return $this->belongsTo(StockOut::class);
    }

    /**
     * Get the product attached to the detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
