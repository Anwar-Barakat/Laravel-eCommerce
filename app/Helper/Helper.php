<?php

use App\Models\ProductRating;
use App\Models\Setting;
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