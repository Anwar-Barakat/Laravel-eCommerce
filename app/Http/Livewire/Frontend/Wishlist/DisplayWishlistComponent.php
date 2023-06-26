<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Livewire\Component;

class DisplayWishlistComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.wishlist.display-wishlist-component', ['wishlist' => $this->getWishlist()]);
    }

    public function removeFromWishlist($product_id)
    {
        add_to_wishlist($product_id);
    }

    public function removeAllWishlist()
    {
        auth_check();
        $ids = Wishlist::select('id')->where('user_id', auth()->id())->get()->toArray();
        Wishlist::destroy($ids);
        toastr()->info('msgs.deleted', ['name' => __('product.products')]);
    }

    public function getWishlist()
    {
        auth_check();
        return Wishlist::where('user_id', auth()->id())->latest()->get();
    }
}
