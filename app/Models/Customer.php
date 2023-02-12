<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Customer extends Model
{
    use HasFactory, SoftDeletes, HasRoles, HasApiTokens, Filterable, LogsActivity, Notifiable;

    protected $guard_name = 'web';

    protected $fillable = [
        'user_id',
        'store_id',
        'customer_type',
        'company_name',
        'business_number',
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'email',
        'mobile',
        'password',
        'is_active',
        'email_verified_at',
        'img_url',
        'is_2fa_enabled',
        'google2fa_secret',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "Customer has been {$eventName}")
            ->useLogName('Customer')
            ->logOnly([
                'user_id',
                'store_id',
                'customer_type',
                'company_name',
                'business_number',
                'first_name',
                'last_name',
                'birthdate',
                'gender',
                'email',
                'mobile',
                'password',
                'is_active',
                'img_url',
                'is_2fa_enabled',
                'google2fa_secret',
            ])
            ->logOnlyDirty();
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A customer has many addresses.
     *
     * @return HasMany addresses
     */
    public function addresses()
    {
        return $this->hasMany(CustomerAddress::class);
    }

    /**
     * Get the store that the customer belongs to.
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * A customer has many items in cart.
     *
     * @return HasMany cart items
     */
    public function cart_items()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * A customer has many orders.
     *
     * @return HasMany orders
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
