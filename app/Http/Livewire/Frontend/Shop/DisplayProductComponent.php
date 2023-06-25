<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayProductComponent extends Component
{
    use WithPagination;

    public $order_by        = 'created_at',
        $sort_by            = 'asc',
        $rating             = [],
        $selectedBrands     = [],
        $min_price, $max_price,
        $per_page           = CUSTOMPAGINATION;

    public function render()
    {
        return view('livewire.frontend.shop.display-product-component', ['products' => $this->getProducts()]);
    }

    public function addToWishlist($product_id)
    {
        add_to_wishlist($product_id);
    }

    public function getProducts()
    {
        return Product::with(['category:id,name,description,url', 'brand:id,name'])
            ->when($this->rating, function ($q) {
                $q->whereHas('ratings', function ($query) {
                    $query->whereIn('rating',  $this->rating);
                });
            })
            ->when($this->max_price, fn ($q) => $q->whereBetween('price', [$this->min_price, $this->max_price]))
            ->when($this->selectedBrands, fn ($q) => $q->whereIn('brand_id',  $this->selectedBrands))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
