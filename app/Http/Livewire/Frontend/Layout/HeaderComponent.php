<?php

namespace App\Http\Livewire\Frontend\Layout;

use App\Models\Cart;
use App\Models\Section;
use Livewire\Component;

class HeaderComponent extends Component
{
    public $sections;
    public  $cart_items;

    protected $listeners    = ['updatedCartItem'];

    public function updatedCartItem($cart)
    {
        $this->cart_items   = $cart;
    }

    public function mount()
    {
        $this->cart_items   = Cart::getCartItems();
        $this->sections     = Section::with('categories')->active()->get();
    }

    public function deleteItem(int $cart_id)
    {
        $cart               = Cart::find($cart_id);
        $cart->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('product.product')]));
        $this->emit('updatedCartItem', ['cart' => $cart]);
    }

    public function render()
    {
        $this->cart_items   = Cart::getCartItems();
        return view('livewire.frontend.layout.header-component', ['cart_items' => $this->cart_items]);
    }
}
