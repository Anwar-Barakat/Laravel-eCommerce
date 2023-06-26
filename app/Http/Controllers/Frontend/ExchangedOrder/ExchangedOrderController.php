<?php

namespace App\Http\Controllers\Frontend\ExchangedOrder;

use App\Http\Controllers\Controller;
use App\Models\OrderExchangeItem;
use Illuminate\Http\Request;

class ExchangedOrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $exchangedOrders = OrderExchangeItem::where('user_id', auth()->id())->latest()->paginate(10);
        return view('frontend.dashboard.exchanged-orders.index', ['exchangedOrders' => $exchangedOrders]);
    }
}