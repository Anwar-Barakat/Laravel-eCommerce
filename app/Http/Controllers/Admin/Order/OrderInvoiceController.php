<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderInvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Order $order)
    {
        if ($order->status !== 'shipped')
            return redirect()->back();

        $order->load('delivery_address', 'order_products');
        return view('admin.orders.invoice', ['order' => $order]);
    }
}
