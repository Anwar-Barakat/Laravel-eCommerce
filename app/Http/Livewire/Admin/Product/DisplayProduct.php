<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayProduct extends Component
{
    use WithPagination;

    public $section_id,
        $category_id,
        $name,
        $price_from,
        $price_to,
        $brand_id = [],
        $order_by   = 'name',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION + 2;

    public function mount()
    {
        $this->price_from = 1;
    }


    public function updateStatus($product_id)
    {
        $product  = Product::findOrFail($product_id);
        $product->update(['is_active' => !$product->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.product.display-product', [
            'products'      => $this->getProducts(),
            'sections'      => Section::get(),
            'categories'    => Category::get(),
            'brands'        => Brand::get(),
        ]);
    }

    public function getProducts()
    {
        return Product::with(['category:id,name,discount', 'brand:id,name'])
            ->search(trim($this->name))
            ->when($this->category_id,  fn ($q) => $q->where('category_id', $this->category_id))
            ->when($this->section_id,   fn ($q) => $q->where('section_id', $this->section_id))
            ->when($this->brand_id,     fn ($q) => $q->whereIn('brand_id', $this->brand_id))
            ->when($this->price_to,     fn ($q)  => $q->whereBetween('price', [$this->price_from, $this->price_to]))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
