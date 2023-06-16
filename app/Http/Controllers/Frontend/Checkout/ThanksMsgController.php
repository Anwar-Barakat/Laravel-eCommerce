<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ThanksMsgController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Order $order)
    {
        if (!$order)
            return redirect()->back();

        return view('frontend.checkout.thanks', ['order' => $order]);
    }
}
