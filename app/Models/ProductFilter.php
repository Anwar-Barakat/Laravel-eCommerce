<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductFilter extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id',
        'filter_id',
        'filter_value_id',
        'is_active',
    ];

    public function filter(): BelongsTo
    {
        return $this->belongsTo(Filter::class, 'filter_id');
    }

    public function filter_value(): BelongsTo
    {
        return $this->belongsTo(FilterValue::class, 'filter_value_id');
    }
}
