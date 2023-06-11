<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Product;
use Livewire\Component;

class ProductDetailSimilarProduct extends Component
{
    public Product $product;

    public $similar_products;

    public function mount(Product $product)
    {
        $this->product            = $product;
        $this->similar_products   = Product::where('category_id', $this->product->category_id)->active()->where('id', '!=', $this->product->id)->limit(6)->get();
    }

    public function render()
    {
        return view('livewire.frontend.product-detail.product-detail-similar-product');
    }
}