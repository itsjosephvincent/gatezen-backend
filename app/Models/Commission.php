<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commission extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'user_id',
        'commissionable_type',
        'commissionable_id',
        'sales_amount',
        'amount',
        'approved_by',
        'approved_at',
        'internal_note',
        'payout_id'
    ];

    public function commissionable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payout()
    {
        return $this->belongsTo(Payout::class);
    }
}
