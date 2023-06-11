<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetailAddToCart extends Component
{
    public Product $product;
    public ProductAttribute $attr;
    public $qty                   = 1;

    public function mount(Product $product, ProductAttribute $attr)
    {
        $this->product            = $product;
        $this->attr               = $attr;
    }

    public function decreaseQty()
    {
        $this->qty                = $this->qty < 1 ? 1 : $this->qty - 1;
    }

    public function increaseQty()
    {
        $this->qty                = $this->qty >= $this->attr->stock ? 1 : $this->qty + 1;
    }

    public function addToCard()
    {
        try {
            if ($this->qty >= $this->attr->stock) {
                toastr()->info(__('validation.qty_not_available_now'));
                $this->qty        = 1;
                return false;
            }

            $session_id           = Session::get('session_id');
            if (!$session_id) {
                $session_id       = Session::getId();
                Session::put('session_id', $session_id);
            }

            DB::beginTransaction();

            if (Auth::check()) :
                $productExists    = Cart::where(['product_id' => $this->product->id, 'size' => $this->attr->size, 'user_id' => Auth::id()])->count();
            else :
                $productExists    = Cart::where(['product_id' => $this->product->id, 'size' => $this->attr->size, 'session_id' => $session_id])->count();
            endif;

            $cart                 = new Cart();
            $cart->session_id     = $session_id;
            $cart->user_id        = Auth::check() ? Auth::id() : null;
            $cart->qty            = $this->qty;
            $cart->product_id     = $this->product->id;
            $cart->size           = $this->attr->size;
            $cart->unit_price     = $this->attr->price;
            $cart->grand_total    = $this->attr->price * $this->qty;
            $cart->save();

            DB::commit();
            toastr()->success(__('msgs.added', ['name' => __('product.product')]));
            $this->reset('qty');

            $this->emit('updatedCartItem', ['cart' => $cart]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('frontend.product.detail', ['product' => $this->product])->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.product-detail.product-detail-add-to-cart');
    }
}