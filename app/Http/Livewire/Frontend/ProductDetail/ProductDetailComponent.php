<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\RecentlyViewedProduct;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetailComponent extends Component
{
    public Product $product;

    public $size, $qty = 1,
        $total_stock;

    public ProductAttribute $attr;

    public function mount(Product $product)
    {
        $this->product  = $product;
        $this->attr     = $product->attributes ? $product->attributes->first() : '';
        $this->size     = $this->attr ? $this->attr->size : '';
    }

    public function updatedSize($value)
    {
        $this->attr             = $this->product->attributes->where('size', $value)->first();
        $this->product->price   = $this->attr->price;
    }

    public function decreaseQty()
    {
        $this->qty = $this->qty < 1 ? 1 : $this->qty - 1;
    }

    public function increaseQty()
    {
        $this->qty = $this->qty >= $this->attr->stock ? 1 : $this->qty + 1;
    }

    public function addToCard()
    {
        if ($this->qty >= $this->attr->stock) {
            toastr()->info(__('validation.qty_not_available_now'));
            $this->qty = 1;
            return false;
        }
    }

    public function render()
    {
        $this->total_stock  = $this->product->attributes->sum('stock');
        $product            = $this->product;


        return view('livewire.frontend.product-detail.product-detail-component', ['product' => $product]);
    }
}
