<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayProductComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::with(['category:id,name'])
            ->paginate(CUSTOMPAGINATION);

        return view('livewire.frontend.shop.display-product-component', ['products' => $products]);
    }
}
