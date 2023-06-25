<?php

namespace App\Http\Controllers\Frontend\ReturnedOrder;

use App\Http\Controllers\Controller;
use App\Models\OrderReturnItem;
use Illuminate\Http\Request;

class ReturnedOrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $returnedOrders = OrderReturnItem::where('user_id', auth()->id())->latest()->paginate(1);
        return view('frontend.dashboard.returned-orders.index', ['returnedOrders' => $returnedOrders]);
    }
}
