<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status',
        'reason',
        'updated_by'
    ];

    const CANCELREASON = [
        1 => 'order_created_by_mistake',
        2 => 'item_not_arrive_on_time',
        3 => 'shipping_charges_too_high',
        4 => 'found_cheaper_somewhere_else',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
