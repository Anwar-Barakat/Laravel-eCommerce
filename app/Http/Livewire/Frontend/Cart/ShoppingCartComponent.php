<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class ShoppingCartComponent extends Component
{


    public function render()
    {
        return view('livewire.frontend.cart.shopping-cart-component');
    }

    public function getProducts()
    {
        return Cart::where();
    }
}
