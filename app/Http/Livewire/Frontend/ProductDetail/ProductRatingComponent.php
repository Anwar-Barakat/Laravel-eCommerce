<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Product;
use App\Models\ProductRating;
use Livewire\Component;

class ProductRatingComponent extends Component
{
    public Product $product;
    public $rating;

    public function mount(Product $product, ProductRating $rating)
    {
        $this->product      = $product;
        $this->rating       = $rating;
    }

    public function render()
    {
        return view('livewire.frontend.product-detail.product-rating-component');
    }

    public function addRating()
    {
        auth_check();

        $this->validate();
        try {
            // Check if the user has been added a review before
            $ratingExists = ProductRating::where(['user_id' => auth()->id(), 'product_id' => $this->product->id])->first();
            if ($ratingExists) {
                toastr()->info(__('frontend.you_have_previous_review'));
                $this->rating = new ProductRating();
                return false;
            }

            $this->rating->user_id      = auth()->id();
            $this->rating->product_id   = $this->product->id;
            $this->rating->save();

            toastr()->success(__('msgs.added', ['name' => __('frontend.product_rating')]));
            $this->rating = new ProductRating();
        } catch (\Throwable $th) {
            return redirect()->route('frontend.product.detail', ['product' => $this->product])->with(['error' => $th->getMessage()]);
        }
    }

    public function rules()
    {
        return [
            'rating.name'   => ['required', 'min:3', 'max:255'],
            'rating.email'  => ['required', 'min:3', 'email'],
            'rating.review' => ['required', 'string', 'min:10'],
            'rating.rating' => ['required', 'in:1,1.5,2,2.5,3,3.5,4,4.5,5'],
        ];
    }
}
