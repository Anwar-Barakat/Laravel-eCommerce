<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;

class OrderDetail extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->order->load('delivery_address');
    }

    public function render()
    {
        return view('livewire.admin.order.order-detail');
    }
}
