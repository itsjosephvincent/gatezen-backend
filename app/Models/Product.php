<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, SoftDeletes, Filterable, LogsActivity, HasSlug;

    protected $fillable = [
        'store_category_id',
        'vat_id',
        'name',
        'price',
        'retail_price',
        'wholesale_price',
        'reorder_level',
        'status',
        'release_date',
        'slug'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "Product has been {$eventName}")
            ->useLogName('Product')
            ->logOnly([
                'store_category_id',
                'vat_id',
                'name',
                'price',
                'retail_price',
                'wholesale_price',
                'reorder_level',
                'status',
                'release_date',
            ])
            ->logOnlyDirty();
    }

    public function store_category()
    {
        return $this->belongsTo(StoreCategory::class);
    }

    /**
     * Get the store category of the product.
     */
    public function category_product()
    {
        return $this->hasMany(CategoryProduct::class);
    }

    /**
     * A product has many medias / images.
     *
     * @return HasMany medias
     */
    public function medias()
    {
        return $this->hasMany(ProductMedia::class);
    }

    /**
     * A product has many order_details
     *
     * @return HasMany order_details
     */
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * A product belongs to vat
     *
     * @return belongsTo vat
     */
    public function vat()
    {
        return $this->belongsTo(Vat::class);
    }
}
