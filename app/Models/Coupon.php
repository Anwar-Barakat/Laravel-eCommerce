<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'option',
        'code',
        'categories',
        'type',
        'amount_type',
        'amount',
        'expiry_date',
        'is_active',
    ];

    protected $casts = ['categories' => 'array'];

    const COUPONOPTION  = [0 => 'manual',       1 => 'automatic'];
    const COUPONTYPE    = [0 => 'single_time',  1 => 'multiple_times'];
    const AMOUNTTYPE    = [0 => 'percentage',   1 => 'fixed'];
}
