<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Product;
use Livewire\Component;

class ProductDetailFixedSide extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product-detail.product-detail-fixed-side');
    }
}
