<?php

namespace App\Http\Livewire\Frontend\Dashboard\Order;

use Livewire\Component;

class DisplayOrder extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = auth()->user()->orders;
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.order.display-order');
    }
}