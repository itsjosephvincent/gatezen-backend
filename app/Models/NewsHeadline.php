<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsHeadline extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'news_category_id',
        'title',
        'description'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('news_media')->useDisk('s3');
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
