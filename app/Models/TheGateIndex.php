<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TheGateIndex extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'the_gate_index';

    protected $fillable = [
        'user_id',
        'tgi_user_id',
        'tgi_referral_code',
        'company_name',
        'company_registration_number',
        'company_address',
        'euro_in_tokens',
        'euro_in_shares',
        'partner_role_name',
        'created_on_date',
        'portal_id',
        'portal_name',
        'role_id',
        'is_partnership_paid',
        'account_type'
    ];

    protected $cast = [
        'is_partnership_paid' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
