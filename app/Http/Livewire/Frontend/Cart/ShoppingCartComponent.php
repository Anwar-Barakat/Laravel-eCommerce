<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductAttribute;
use Livewire\Component;

class ShoppingCartComponent extends Component
{
    public $qty = 0;
    public Product $product;
    public ProductAttribute $attr;

    public function increaseQty($product_id, $attr_id)
    {
        $this->getProductAndAttr($product_id, $attr_id);
    }

    public function render()
    {
        return view('livewire.frontend.cart.shopping-cart-component', ['cart_items' => Cart::getCartItems()]);
    }

    public function getProductAndAttr($product_id, $attr_id)
    {
        $this->product  = Product::findOrFail($product_id);
        $this->attr     = ProductAttribute::findOrFail($attr_id);
    }
}
