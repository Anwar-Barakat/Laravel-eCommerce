<?php

namespace App\Http\Livewire\Frontend\Dashboard\DeliveryAddress;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DisplayDeliveryAddress extends Component
{
    public $addresses;

    public function mount()
    {
        $this->addresses = Auth::user()->delivery_addresses;
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.delivery-address.display-delivery-address');
    }
}