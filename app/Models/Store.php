<?php

namespace App\Models;

use App\Enum\StoreStatus;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Store extends Model
{
    use HasFactory, SoftDeletes, Filterable, LogsActivity;

    protected $fillable = [
        'template_id',
        'store_category_id',
        'url',
        'store_name',
        'status',
        'is_private',
        'is_wholesaler',
        'theme_color',
        'text_color',
        'template_version',
    ];

    protected $cast = ['status' => StoreStatus::class];

    public function storeIsActive(): bool
    {
        return $this->status == StoreStatus::Active;
    }

    public function storeIsDeactivated(): bool
    {
        return $this->status == StoreStatus::Deactivated;
    }

    public function storeIsPending(): bool
    {
        return $this->status == StoreStatus::Pending;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "Store has been {$eventName}")
            ->useLogName('Store')
            ->logOnly([
                'template_id',
                'store_category_id',
                'url',
                'store_name',
                'status',
                'is_private',
                'is_wholesaler',
                'theme_color',
                'text_color',
                'template_version',
            ])
            ->logOnlyDirty();
    }

    /**
     * A store has one main store owner.
     *
     * @return HasOne main store owner
     */
    public function store_owner()
    {
        return $this->hasOne(StoreUser::class);
    }

    /**
     * A store has many store users.
     *
     * @return HasMany store users
     */
    public function store_users()
    {
        return $this->hasMany(StoreUser::class);
    }

    /**
     * Get the template of the store.
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * Get the category of the store.
     */
    public function store_category()
    {
        return $this->belongsTo(StoreCategory::class);
    }

    /**
     * A store has many customers.
     *
     * @return HasMany customers
     */
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
