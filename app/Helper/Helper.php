<?php

use App\Models\ProductRating;
use App\Models\Setting;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

if (!function_exists('auth_check')) {
    function auth_check()
    {
        if (!Auth::check()) {
            toastr()->info(__('frontend.you_must_be_logged_in'));
            return redirect()->route('login');
        }
    }
}

if (!function_exists('get_setting')) {
    function get_setting()
    {
        return Setting::first();
    }
}

if (!function_exists('product_reviews')) {
    function product_reviews($product_id)
    {
        return ProductRating::where('product_id', $product_id)->active()->get();
    }
}

if (!function_exists('add_to_wishlist')) {
    function add_to_wishlist($product_id)
    {
        if (!Auth::check()) {
            toastr()->info(__('frontend.you_must_be_logged_in'));
            return redirect()->route('login');
        }

        $productExists  = Wishlist::where(['product_id' => $product_id, 'user_id' => auth()->id()])->first();
        if (!$productExists) {
            Wishlist::create([
                'user_id'       => auth()->id(),
                'product_id'    => $product_id
            ]);
            toastr()->success(__('msgs.added', ['name' => __('product.product')]));
        } else {
            $productExists->delete();
            toastr()->info(__('msgs.deleted', ['name' => __('product.product')]));
        }
    }
}