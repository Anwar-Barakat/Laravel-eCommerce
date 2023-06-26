<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Models\Category;
use App\Models\Filter;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryProductComponent extends Component
{
    use WithPagination;

    public $category,
        $sub_cats           = [],
        $filters,
        $min_price, $max_price,
        $rating             = [],
        $selectedFilters    = [],
        $selectedBrands     = [],
        $order_by           = 'created_at',
        $sort_by            = 'asc',
        $per_page           = CUSTOMPAGINATION - 2;

    public function mount($url)
    {
        $this->category = Category::with('subCategories:id,name,url,description,parent_id', 'parentCategory:id,name,url')->select('id', 'name', 'url', 'description', 'parent_id')->where('url', $url)->first();
        if (!$this->category)
            return redirect()->back();

        $this->sub_cats     = $this->category->subcategories->pluck('id');
        $this->sub_cats[]   = $this->category->id;

        $this->filters      = Filter::with(['filter_values'])->active()->get();
    }

    public function updatedSelectedFilters($value)
    {
    }

    public function addToWishlist($product_id)
    {
        add_to_wishlist($product_id);
    }

    public function render()
    {
        return view('livewire.frontend.shop.category-product-component', ['products' => $this->getProducts()]);
    }

    public function getProducts()
    {
        return Product::with(['category:id,name,url', 'brand:id,name'])
            ->when(
                $this->selectedFilters,
                fn ($q) => $q->whereHas('filters', function ($query) {
                    $query->whereHas(
                        'filter_value',
                        function ($query) {
                            $query->whereIn('id', $this->selectedFilters);
                        }
                    );
                })
            )
            ->when($this->rating, function ($q) {
                $q->whereHas('ratings', function ($query) {
                    $query->whereIn('rating',  $this->rating);
                });
            })
            ->whereIn('category_id', $this->sub_cats)
            ->when($this->max_price, fn ($q) => $q->whereBetween('price', [$this->min_price, $this->max_price]))
            ->when($this->selectedBrands, fn ($q) => $q->whereIn('brand_id',  $this->selectedBrands))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
