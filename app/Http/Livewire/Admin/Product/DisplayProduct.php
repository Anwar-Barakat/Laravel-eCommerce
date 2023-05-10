<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayProduct extends Component
{
    use WithPagination;

    public function updateStatus($product_id)
    {
        $product  = Product::findOrFail($product_id);
        $product->update(['is_active' => !$product->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.product.display-product', ['products' => $this->getProducts()]);
    }

    public function getProducts()
    {
        return Product::latest()->paginate(CUSTOMPAGINATION);
    }
}
