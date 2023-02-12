<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'is_active',
    ];

    /**
     * A product category has many category products.
     *
     * @return HasMany categories
     */
    public function category_products()
    {
        return $this->hasMany(CategoryProduct::class);
    }
}
