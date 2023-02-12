<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'name',
        'key',
        'commission'
    ];

    /**
     * A plan has many subscriptions.
     *
     * @return HasMany subscriptions
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
