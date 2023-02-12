<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use EloquentFilter\Filterable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Admin extends Model
{
    use HasFactory, SoftDeletes, HasRoles, HasApiTokens, Filterable, LogsActivity, Notifiable;

    protected $guard_name = 'web';

    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'email',
        'password',
        'confirmed_at',
        'img_url',
        'is_2fa_enabled',
        'google_2fa_secret',
        'is_active',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "An Admin has been {$eventName}")
            ->useLogName('Admin')
            ->logOnly([
                'first_name',
                'last_name',
                'birthdate',
                'gender',
                'email',
                'password',
                'confirmed_at',
                'img_url',
                'is_2fa_enabled',
                'google_2fa_secret',
                'is_active',
            ])
            ->logOnlyDirty();
    }

    /**
     * An admin have many encoded receivings.
     *
     * @return HasMany receivings
     */
    public function receivings()
    {
        return $this->hasMany(Receiving::class);
    }

    /**
     * An admin have many encoded stockouts.
     *
     * @return HasMany stockouts
     */
    public function stockouts()
    {
        return $this->hasMany(StockOut::class);
    }
}
