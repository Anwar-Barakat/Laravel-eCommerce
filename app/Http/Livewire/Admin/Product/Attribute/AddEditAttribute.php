<?php

namespace App\Http\Livewire\Admin\Product\Attribute;

use App\Models\Product;
use Livewire\Component;

class AddEditAttribute extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.admin.product.attribute.add-edit-attribute');
    }
}
