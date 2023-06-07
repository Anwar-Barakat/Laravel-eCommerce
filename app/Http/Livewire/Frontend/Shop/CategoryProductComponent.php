<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryProductComponent extends Component
{
    use WithPagination;

    public $category,
        $sub_cats = [];

    public function mount($url)
    {
        $this->category = Category::with('subCategories:id,name,url,description,parent_id', 'parentCategory:id,name,url')->select('id', 'name', 'url', 'description', 'parent_id')->where('url', $url)->first();
        if (!$this->category)
            return redirect()->back();


        $this->sub_cats   = $this->category->subcategories->pluck('id');
        $this->sub_cats[]   = $this->category->id;
    }

    public function render()
    {
        $products = Product::with(['category:id,name', 'brand:id,name'])
            ->whereIn('category_id', $this->sub_cats)->paginate(CUSTOMPAGINATION);

        return view('livewire.frontend.shop.category-product-component', ['products' => $products]);
    }
}
