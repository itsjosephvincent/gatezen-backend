<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_name',
        'contact_no',
        'email_address',
        'street',
        'country',
        'postal',
    ];

    /**
     * A customer has many receiving details.
     *
     * @return HasMany receiving details
     */
    public function receiving_details()
    {
        return $this->hasMany(ReceivingDetail::class);
    }
}
