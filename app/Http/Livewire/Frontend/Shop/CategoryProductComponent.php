<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Models\Category;
use Livewire\Component;

class CategoryProductComponent extends Component
{
    public $category,
        $sub_cats = [];

    public function mount($url)
    {
        $this->category = Category::with('subCategories:id,name')->select('id', 'name', 'url')->where('url', $url)->first();
        if (!$this->category)
            return redirect()->back();

        $this->sub_cats[]   = $this->category->id;
        $this->sub_cats[]   = $this->category->subcategories->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.frontend.shop.category-product-component');
    }
}
