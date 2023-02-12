<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBankDetail extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'user_id',
        'account_number',
        'account_name',
        'bank_name',
        'bank_swift_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
