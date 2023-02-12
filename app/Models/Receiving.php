<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receiving extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status',
        'encoded_by',
    ];

    /**
     * Get the admin who encoded the receiving.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * A receiving has many items.
     *
     * @return HasMany receiving details
     */
    public function receiving_details()
    {
        return $this->hasMany(ReceivingDetail::class);
    }
}
