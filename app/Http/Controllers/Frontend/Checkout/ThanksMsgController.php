<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class ThanksMsgController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Order $order)
    {
        if (!$order && ($order->user_id != auth()->id()))
            return redirect()->back();

        Cart::where('user_id', auth()->id())->delete();
        return view('frontend.checkout.thanks', ['order' => $order]);
    }
}
