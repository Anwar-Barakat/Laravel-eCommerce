<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetailComponent extends Component
{
    public Product $product;

    public $size, $qty = 1,
        $total_stock;

    public $attr;

    public function mount(Product $product)
    {
        $this->product          = $product;
        $this->attr             = $product->attributes ? $product->attributes->first() : '';
        $this->size             = $this->attr ? $this->attr->size : '';
    }

    public function updatedSize($value)
    {
        $this->attr             = $this->product->attributes->where('size', $value)->first();
        $this->product->price   = $this->attr->price;
    }

    public function decreaseQty()
    {
        $this->qty                = $this->qty < 1 ? 1 : $this->qty - 1;
        $this->product->price   = $this->attr->price;
    }

    public function increaseQty()
    {
        $this->qty                = $this->qty >= $this->attr->stock ? 1 : $this->qty + 1;
        $this->product->price   = $this->attr->price;
    }

    public function addToCard()
    {
        try {
            if (!$this->size) {
                toastr()->info(__('validation.required', ['attribute' => __('product.size')]));
                return false;
            }

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

            $cart    = Auth::check()
                ? Cart::where(['product_id' => $this->product->id, 'size' => $this->attr->size, 'user_id' => Auth::id()])->first()
                : $cart    = Cart::where(['product_id' => $this->product->id, 'size' => $this->attr->size, 'session_id' => $session_id])->first();

            if ($cart) {
                $qty = (int)$cart->qty + (int)$this->qty;
                $cart->update(['qty' => $qty, 'grand_total' => $qty * $cart->unit_price]);
            } else {

                $cart                 = new Cart();
                $cart->session_id     = $session_id;
                $cart->user_id        = Auth::check() ? Auth::id() : null;
                $cart->qty            = $this->qty;
                $cart->product_id     = $this->product->id;
                $cart->size           = $this->attr->size;
                $cart->unit_price     = $this->attr->price;
                $cart->grand_total    = $this->attr->price * $this->qty;
                $cart->save();
            }

            $this->reset('size', 'qty');

            toastr()->success(__('msgs.added', ['name' => __('product.product')]));
            DB::commit();
            $this->emit('updatedCartItem', ['cart' => $cart]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('frontend.product.detail', ['product' => $this->product])->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        $this->total_stock      = $this->product->attributes->sum('stock');
        return view('livewire.frontend.product-detail.product-detail-component');
    }
}
