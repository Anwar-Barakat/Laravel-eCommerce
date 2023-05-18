<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories',
        'name',
        'field',
        'is_active',
    ];

    protected $casts = ['categories' => 'array'];

    public function scopeActive($query)
    {
        return $query->where(['is_active' => 1]);
    }

    public function filter_values()
    {
        return $this->hasMany(FilterValue::class, 'filter_id');
    }
}
