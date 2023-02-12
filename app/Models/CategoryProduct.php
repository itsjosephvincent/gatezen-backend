<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_category_id',
    ];

    /**
     * Get the product category attached to category products.
     */
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
