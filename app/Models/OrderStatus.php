<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    const STATUS = [
        'new', 'pending', 'cancelled', 'in_process', 'shipped', 'delivered', 'paid'
    ];

    public function scopeActive($query)
    {
        return $query->where(['is_active' => 1]);
    }
}
