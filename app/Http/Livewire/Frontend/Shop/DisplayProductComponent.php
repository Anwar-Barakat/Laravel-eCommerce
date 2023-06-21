<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayProductComponent extends Component
{
    use WithPagination;

    public $order_by   = 'created_at',
        $sort_by    = 'asc',
        $rating = [],
        $per_page   = CUSTOMPAGINATION - 2;

    public function render()
    {
        return view('livewire.frontend.shop.display-product-component', ['products' => $this->getProducts()]);
    }

    public function getProducts()
    {
        return Product::with(['category:id,name,description,url', 'brand:id,name'])
            ->when($this->rating, function ($q) {
                $q->whereHas('ratings', function ($query) {
                    $query->when($this->rating, fn ($q) => $q->whereIn('rating',  $this->rating));
                });
            })
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
