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
        'new',
        'in_process',
        'pending',
        'shipped',
        'delivered',
        'cancelled',
    ];

    public function scopeActive($query)
    {
        return $query->where(['is_active' => 1]);
    }

    public function scopeBeforeOrEqual($query, $status)
    {
        return $query->where('id', '<=', $status->id);
    }
}
