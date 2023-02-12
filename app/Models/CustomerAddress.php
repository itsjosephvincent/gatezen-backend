<?php

namespace App\Models;

use App\Enum\CustomerAddressType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'address_type',
        'care_of',
        'address_1',
        'address_2',
        'state',
        'city',
        'postal_code',
        'country_id',
        'delivery_notes',
    ];

    protected $cast = ['address_type' => CustomerAddressType::class];

    public function addressTypeIsBilling(): bool
    {
        return $this->address_type == CustomerAddressType::Billing->value;
    }

    public function addressTypeIsShipping(): bool
    {
        return $this->address_type == CustomerAddressType::Shipping->value;
    }

    /**
     * Get the customer that owns the address.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
