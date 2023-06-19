<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ShippingCharge;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCartComponent extends Component
{
    public $qty;
    public Product $product;
    public ProductAttribute $attr, $weights;

    public $cart_items;
    public $country,
        $charges;

    public $coupon = '';

    protected $listeners = ['updatedCartItem'];

    public function updatedCartItem($cart)
    {
        $this->cart_items = $cart;
    }

    public function updatedCountry($value)
    {
        $this->charges = ShippingCharge::calcShippingCharges($value);
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
        $this->emit('updatedCartItem', ['cart' => $cart]);

        if ($this->country)
            $this->charges = ShippingCharge::calcShippingCharges($this->country);
    }


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
        $this->emit('updatedCartItem', ['cart' => $cart]);

        if ($this->country)
            $this->charges = ShippingCharge::calcShippingCharges($this->country);
    }


    public function deleteItem(int $cart_id)
    {
        $cart       = Cart::find($cart_id);
        $cart->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('product.product')]));
        $this->emit('updatedCartItem', ['cart' => $cart]);

        if ($this->country)
            $this->charges = ShippingCharge::calcShippingCharges($this->country);
    }

    public function render()
    {
        $this->cart_items = Cart::getCartItems();
        return view('livewire.frontend.cart.shopping-cart-component', ['cart_items' => $this->cart_items]);
    }
}