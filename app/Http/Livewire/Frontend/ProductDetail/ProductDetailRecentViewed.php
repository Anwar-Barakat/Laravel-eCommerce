<?php

namespace App\Http\Livewire\Frontend\ProductDetail;

use App\Models\Product;
use App\Models\RecentlyViewedProduct;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetailRecentViewed extends Component
{
    public Product $product;

    public $recently_viewed;

    public function mount(Product $product)
    {
        $this->product          = $product;

        // set session
        $session_id     = empty(Session::get('session_id')) ? md5(uniqid(rand(), true)) : Session::get('session_id');
        $session_exists = RecentlyViewedProduct::where(['product_id' => $this->product->id, 'session_id' => $session_id])->exists();
        Session::put('session_id', $session_id);
        $this->emit('getSessionID', ['sessionId' => $session_id]);

        if (!$session_exists)
            RecentlyViewedProduct::create(['product_id' => $this->product->id, 'session_id' => $session_id]);

        $this->recently_viewed  = RecentlyViewedProduct::with('product:id,name,category_id,price,discount_value')
            ->where('session_id', $session_id)->InRandomOrder()->limit(6)->get();
    }

    public function render()
    {
        return view('livewire.frontend.product-detail.product-detail-recent-viewed');
    }
}
