<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'store_id',
        'title',
        'content',
        'category_id'
    ];

    public function store_category()
    {
        return $this->belongsTo(StoreCategory::class);
    }

    public function faq_category()
    {
        return $this->belongsTo(FaqCategory::class);
    }
}
