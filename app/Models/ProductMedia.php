<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductMedia extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, Filterable;

    protected $fillable = [
        'product_id',
        'name',
        'media_url',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_media')->useDisk('s3');
    }

    /**
     * Get the product the media belongs to.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
