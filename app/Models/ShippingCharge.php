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

    public static function calcShippingCharges($country_id = null)
    {
        if (!$country_id) {
            return [
                'value'     => 0,
                'weights'   => 0
            ];
        }

        $charges = self::where('country_id', $country_id)->first();

        $weights = 0;
        foreach (Cart::getCartItems() as $cart)
            $weights = $cart->product->weight * $cart->qty;

        if ($weights > 0 && $weights <= 500) {
            $shippingCharges = $charges->zero_500g;
        } elseif ($weights > 501 && $weights <= 1000) {
            $shippingCharges = $charges->_501_1000g;
        } elseif ($weights > 1000 && $weights <= 2000) {
            $shippingCharges = $charges->_1001_2000g;
        } elseif ($weights > 2000 && $weights <= 5000) {
            $shippingCharges = $charges->_2001_5000g;
        } elseif ($weights > 5000) {
            $shippingCharges = $charges->above_5000g;
        } else {
            $shippingCharges = 0;
        }

        return [
            'value'     => $shippingCharges,
            'weights'   => $weights
        ];
    }
}
