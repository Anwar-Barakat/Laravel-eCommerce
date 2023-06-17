<?php

namespace App\Http\Livewire\Frontend\Dashboard\Order;

use App\Models\Order;
use Livewire\Component;

class OrderDetail extends Component
{
    public $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }
    public function render()
    {
        return view('livewire.frontend.dashboard.order.order-detail');
    }
}
