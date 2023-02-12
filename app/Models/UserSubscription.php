<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class UserSubscription extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'plan_id',
        'user_id',
        'role_id',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "User Subscription has been {$eventName}")
            ->useLogName('User Subscription')
            ->logOnly([
                'plan_id',
                'user_id',
                'role_id',
            ])
            ->logOnlyDirty();
    }

    /**
     * Get the user that owns the user subscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the user subscription.
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
