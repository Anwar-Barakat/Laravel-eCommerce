<?php

namespace App\Http\Controllers\Admin\ExchangedOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExchangedOrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.exchanged-orders.index');
    }
}
