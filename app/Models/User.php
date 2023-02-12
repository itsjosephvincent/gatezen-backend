<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Filterable, LogsActivity, InteractsWithMedia;

    protected $guard_name = 'web';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'birthdate',
        'password',
        'confirmed_at',
        'img_url',
        'is_active',
        'is_2fa_enabled',
        'google2fa_secret',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "User has been {$eventName}")
            ->useLogName('User')
            ->logOnly([
                'first_name',
                'last_name',
                'email',
                'mobile',
                'birthdate',
                'password',
                'confirmed_at',
                'img_url',
                'is_active',
                'is_2fa_enabled',
                'google2fa_secret',
            ])
            ->logOnlyDirty();
    }

    protected $hidden = [
        'password'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('user_media')->useDisk('s3');
    }

    /**
     * A user has one address.
     *
     * @return HasOne address
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * A user has one the_gate_index.
     *
     * @return HasOne address
     */
    public function the_gate_index()
    {
        return $this->hasOne(TheGateIndex::class);
    }

    /**
     * A user has one user subscription.
     *
     * @return HasOne user subscription
     */
    public function user_subscription()
    {
        return $this->hasOne(UserSubscription::class);
    }

    /**
     * A user has one store user.
     *
     * @return HasMany store user
     */
    public function stores_user()
    {
        return $this->hasMany(StoreUser::class);
    }
}
