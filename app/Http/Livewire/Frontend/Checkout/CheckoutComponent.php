<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $cart_items;

    public function mount()
    {
        $this->cart_items = Cart::getCartItems();
    }
    public function render()
    {
        return view('livewire.frontend.checkout.checkout-component');
    }
}