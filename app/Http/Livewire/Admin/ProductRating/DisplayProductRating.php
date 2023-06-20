<?php

namespace App\Http\Livewire\Admin\ProductRating;

use App\Models\ProductRating;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayProductRating extends Component
{
    use WithPagination;

    public $name,
        $rating,
        $order_by   = 'created_at',
        $sort_by    = 'desc',
        $per_page   = CUSTOMPAGINATION;

    public function updateStatus(ProductRating $review)
    {
        $review->update(['is_active' => !$review->is_active]);
    }


    public function render()
    {
        return view('livewire.admin.product-rating.display-product-rating', ['reviews' => $this->getProductRating()]);
    }

    public function getProductRating()
    {
        return ProductRating::whereHas('product', function ($query) {
            $query->when($this->name, fn ($q) => $q->search(trim($this->name)));
        })->with('product:id,name')
            ->when($this->rating, fn ($q) => $q->where('rating', $this->rating))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
