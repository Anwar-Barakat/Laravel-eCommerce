<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id',
        'product_id',
        'color',
        'size',
        'qty',
        'unit_price',
        'grand_total',
    ];

    public static function getCartItems()
    {
        return Auth::check()
            ? Auth::user()->cart_items
            : Cart::with('product:id,name,category_id,weight')->where('session_id', Session::get('session_id'))->orderBy('id', 'desc')->get();
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
