<?php

namespace App\Http\Livewire\Frontend\Layout;

use App\Models\Cart;
use App\Models\Section;
use Livewire\Component;

class HeaderComponent extends Component
{
    public $sections;
    public $cart_items;

    protected $listeners = ['updatedCartItem'];

    public function updatedCartItem(Cart $cart)
    {
        $this->cart_items = $cart;
    }

    public function mount()
    {
        $this->sections = Section::with('categories')->active()->get();
    }

    public function render()
    {
        $this->cart_items = Cart::getCartItems();
        return view('livewire.frontend.layout.header-component', ['cart_items' => $this->cart_items]);
    }
}