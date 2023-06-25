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

    const RETURNEXCHANGEREASON = [
        1 => 'preformace_or_quality_not_adequate',
        2 => 'product_damaged_but_shipping_box_ok',
        3 => 'item_arrived_too_late',
        4 => 'wrong_item_was_send',
        5 => 'item_defective_or_donest_work',
        6 => 'require_smaller_size',
        7 => 'require_larger_size',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}