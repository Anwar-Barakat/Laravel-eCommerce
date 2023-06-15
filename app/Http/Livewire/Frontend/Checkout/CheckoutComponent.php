<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $cart_items;

    public $default_address = '';

    public function mount()
    {
        $this->cart_items       = Cart::getCartItems();
        $this->default_address  = Auth::check() ? Auth::user()->delivery_addresses->where('is_default', 1)->first() : '';
    }
    public function render()
    {
        return view('livewire.frontend.checkout.checkout-component');
    }
}
