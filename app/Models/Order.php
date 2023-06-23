<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_address_id',
        'shipping_charges',
        'coupon_code',
        'coupon_value',
        'status',
        'payment_method',
        'payment_gateway',
        'tracking_number',
        'courier_name',
        'grand_price',
    ];

    const PAYMENTMETHOD = [
        [
            'id'    => 1,
            'title' => 'Cash on Delivery',
            'desc'  => 'Pay Upon Cash on delivery. (This service is only available for some countries)'
        ],
        [
            'id'    => 2,
            'title' => 'Pay With Credit / Debit Card',
            'desc'  => 'International Credit Cards must be eligible for use within the United States.',
        ],
    ];

    // don't change these status 
    const ORDERCASES =  ['new', 'in_process', 'pending', 'shipped', 'delivered', 'cancelled'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function delivery_address(): BelongsTo
    {
        return $this->belongsTo(DeliveryAddress::class, 'delivery_address_id');
    }

    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function order_cases()
    {
        return $this->hasMany(OrderLog::class);
    }
}