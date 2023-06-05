<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Product;
use Livewire\Component;

class FeaturedProductComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.home.featured-product-component', ['featured_products' => $this->getFeaturedProducts()]);
    }

    public function getFeaturedProducts()
    {
        return Product::where('is_featured', 1)->active()->inRandomOrder()->take(4)->get();
    }
}
