<?php

namespace App\Http\Livewire\Frontend\Dashboard\Order;

use App\Models\Order;
use App\Models\OrderLog;
use App\Models\OrderReturnItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderDetail extends Component
{
    public $order;

    protected $listeners = ['updatedOrderReturnItemStatus'];

    public function updatedOrderReturnItemStatus(Order $order)
    {
        $this->order = $order;
    }

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.order.order-detail');
    }
}
