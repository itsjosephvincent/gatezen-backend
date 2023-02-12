<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class StoreUser extends Model
{
    use HasFactory, LogsActivity, Filterable;

    protected $fillable = [
        'user_id',
        'store_id',
    ];

    public function getActivitylogOptions(): LogOPtions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "Store User has been {$eventName}")
            ->useLogName('Store User')
            ->logOnly([
                'user_id',
                'store_id',
            ])
            ->logOnlyDirty();
    }

    /**
     * Get the user of the store user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the stores of the store user.
     */
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
