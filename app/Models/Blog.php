<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Spatie\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\SlugOptions;

class Blog extends Model implements HasMedia
{
    use HasFactory, HasSlug, Filterable, InteractsWithMedia;

    protected $fillable = [
        'thumbnail_url',
        'title',
        'content',
        'store_category_id',
        'blog_category_id',
        'slug'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('blog_media')->useDisk('s3');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function store_category()
    {
        return $this->belongsTo(StoreCategory::class);
    }

    public function blog_category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
