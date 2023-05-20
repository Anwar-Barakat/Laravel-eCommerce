<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'zero_500g',
        '_501_1000g',
        '_1001_2000g',
        '_2001_5000g',
        'above_5000g',
        'is_active'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}