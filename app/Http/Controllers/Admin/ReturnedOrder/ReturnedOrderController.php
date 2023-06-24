<?php

namespace App\Http\Controllers\Admin\ReturnedOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnedOrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.returned-orders.index');
    }
}
