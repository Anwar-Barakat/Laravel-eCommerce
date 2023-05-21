<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'exchange_rate',
        'is_active'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('code', 'LIKE', $term);
        });
    }
}
