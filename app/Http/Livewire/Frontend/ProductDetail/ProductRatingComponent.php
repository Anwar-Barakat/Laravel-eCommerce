<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductRatingComponent extends Component
{
    public Product $product;
    public $rating;

    public
        $order_by   = 'created_at',
        $sort_by    = 'desc',
        $per_page   = CUSTOMPAGINATION;

    public function mount(Product $product, ProductRating $rating)
    {
        $this->product      = $product;
        $this->rating       = $rating;
    }


    public function addRating()
    {
        if (!Auth::check()) {
            toastr()->info(__('frontend.you_must_be_logged_in'));
            return redirect()->route('login');
        }

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
            $this->emit('updateProductRating', $this->getReviews());
            $this->rating = new ProductRating();
        } catch (\Throwable $th) {
            return redirect()->route('frontend.product.detail', ['product' => $this->product])->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.product-detail.product-rating-component', ['reviews' => $this->getReviews()]);
    }

    public function rules()
    {
        return [
            'rating.name'   => ['required', 'min:3', 'max:255'],
            'rating.email'  => ['required', 'min:3', 'email'],
            'rating.review' => ['required', 'string', 'min:10'],
            'rating.rating' => ['required', 'in:1,2,3,4,5'],
        ];
    }

    public function getReviews()
    {
        return ProductRating::with('user:id,first_name,last_name')
            ->where('product_id', $this->product->id)->active()
            ->orderBy($this->order_by, $this->sort_by)
            ->get();
    }
}
