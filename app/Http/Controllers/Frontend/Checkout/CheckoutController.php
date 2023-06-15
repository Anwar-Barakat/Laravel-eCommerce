<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __invoke()
    {
        return view('frontend.checkout.index');
    }
}
