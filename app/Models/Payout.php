<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payout extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'user_id',
        'payout_status',
        'user_bank_details',
        'reference',
        'internal_note',
        'amount',
        'paid_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
