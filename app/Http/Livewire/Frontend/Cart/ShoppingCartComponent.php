<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductAttribute;
use Livewire\Component;

class ShoppingCartComponent extends Component
{
    public $qty;
    public Product $product;
    public ProductAttribute $attr;

    public function decreaseQty(int $cart_id)
    {
        $cart       = Cart::find($cart_id);
        $this->qty  = (int)$cart->qty - 1;

        if ($this->qty == 0) :
            $cart->delete();
            toastr()->info(__('msgs.deleted', ['name' => __('product.product')]));
        else :
            $cart->update(['qty' => $this->qty, 'grand_total' => $this->qty * $cart->unit_price]);
        endif;
    }

    public function increaseQty(int $cart_id)
    {
        $cart       = Cart::find($cart_id);
        $this->qty  = (int)$cart->qty + 1;

        $product    = Product::find($cart->product_id);
        $attr       = $product->attributes->where('size', $cart->size)->first();
        if ($attr->stock < $this->qty) {
            toastr()->info(__('validation.qty_not_available_now'));
            return false;
        }

        $cart->update(['qty' => $this->qty, 'grand_total' => $this->qty * $cart->unit_price]);
    }


    public function render()
    {
        return view('livewire.frontend.cart.shopping-cart-component', ['cart_items' => Cart::getCartItems()]);
    }
}
