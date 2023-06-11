<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'size',
        'price',
        'stock',
        'is_active',
    ];

    public function scopeActive($query)
    {
        return $query->where(['is_active' => 1])->where('stock', '>', 0);
    }
}