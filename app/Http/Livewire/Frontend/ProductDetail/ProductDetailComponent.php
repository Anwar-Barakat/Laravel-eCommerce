<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Product;
use App\Models\RecentlyViewedProduct;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetailComponent extends Component
{
    public Product $product;

    public $size, $total_stock;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function updatedSize($value)
    {
        $attr                   = $this->product->attributes->where('size', $value)->first();
        $this->product->price   = $attr->price;
    }

    public function render()
    {
        $this->total_stock  = $this->product->attributes->sum('stock');
        $product            = $this->product;
        return view('livewire.frontend.product-detail.product-detail-component', ['product' => $product]);
    }
}
