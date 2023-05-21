<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Currency extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'code',
        'exchange_rate',
        'is_active'
    ];

    public $translatable    = ['name'];

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