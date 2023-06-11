<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\RecentlyViewedProduct;
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
        $this->product  = $product;
        $this->attr     = $product->attributes ? $product->attributes->first() : '';
        $this->size     = $this->attr ? $this->attr->size : '';
    }

    public function updatedSize($value)
    {
        $this->attr             = $this->product->attributes->where('size', $value)->first();
        $this->product->price   = $this->attr->price;
    }

    public function render()
    {
        $this->total_stock  = $this->product->attributes->sum('stock');
        return view('livewire.frontend.product-detail.product-detail-component');
    }
}