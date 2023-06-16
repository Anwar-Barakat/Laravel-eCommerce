<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
