<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'before_quantity',
        'adjustment_quantity',
        'reference_type',
        'reference_id',
        'description',
    ];
}
