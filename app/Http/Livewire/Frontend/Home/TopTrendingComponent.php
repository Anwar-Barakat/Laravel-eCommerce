<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class TopTrendingComponent extends Component
{
    public $best_seller_category    = [],
        $have_discount_category     = [],
        $new_product_category       = [];

    public function mount()
    {
        $subquery = Product::select('category_id')->selectRaw('COUNT(*) as product_count')
            ->where('is_best_seller', 1)->groupBy('category_id')
            ->orderByDesc('product_count')->limit(1);


        // 1- get the category that has the most significant number of the best seller
        $this->best_seller_category     = Category::with('products')->where(function ($query) use ($subquery) {
            $query->where('id', $subquery->pluck('category_id'));
        })->first();

        // 2- get the category that have a discount
        $this->have_discount_category   = Category::with('products')->whereHas('products')->where('discount', '>', 0)->inRandomOrder()->first();

        $this->new_product_category = Category::has('products', '>=', 1)
            ->whereHas('products', function ($query) {
                $query->whereDate('created_at', '>', Carbon::now()->subMonth(1));
            })->inRandomOrder()
            ?->whereNotIn('id', [$this->best_seller_category?->id, $this->have_discount_category?->id])
            ->first();
    }

    public function render()
    {
        return view('livewire.frontend.home.top-trending-component');
    }
}
