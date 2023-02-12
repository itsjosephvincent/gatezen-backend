<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class StoreCategory extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, Filterable, InteractsWithMedia;

    protected $fillable = [
        'name',
        'img_url',
        'description',
        'status',
        'logo_url'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeSortByStatus($query)
    {
        return $query->orderByRaw("Case
        WHEN status = 'available_now' THEN 1
        WHEN status = 'pre_launch' THEN 2
        WHEN status = 'coming_soon' THEN 3
        ELSE 4 END");
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('store_category_media')->useDisk('s3');
    }

    /**
     * Get stores with the category.
     *
     * @return HasMany stores
     */
    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    /**
     * A category has many products.
     *
     * @return HasMany products
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * A category has many templates.
     *
     * @return HasMany templates
     */
    public function templates()
    {
        return $this->hasMany(Template::class);
    }
}
