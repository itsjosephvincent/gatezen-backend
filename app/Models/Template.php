<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Template extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, Filterable, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'name',
        'repo_url',
        'image_url',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "Template has been {$eventName}")
            ->useLogName('Template')
            ->logOnly([
                'name',
                'repo_url',
                'image_url',
            ])
            ->logOnlyDirty();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('template_media')->useDisk('s3');
    }

    /**
     * Get stores that uses a template.
     *
     * @return HasMany stores
     */
    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    /**
     * A template belongs to a store category.
     *
     * @return BelongsTo the attached store_category
     */
    public function store_category()
    {
        return $this->belongsTo(StoreCategory::class);
    }
}
