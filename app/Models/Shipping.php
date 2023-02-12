<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'care_of',
        'address_1',
        'address_2',
        'city',
        'postal_code',
        'country_id',
        'mobile_no',
        'delivery_notes',
        'address_type',
    ];

    /**
     * Get the order the shipping details belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the country the shipping details belongs to.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
