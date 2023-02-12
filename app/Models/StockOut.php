<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockOut extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'status',
    ];

    /**
     * A stockout has many items.
     *
     * @return HasMany stockout details
     */
    public function stockout_details()
    {
        return $this->hasMany(StockOut::class);
    }
}
