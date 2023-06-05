<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($url)
    {
        return view('frontend.shop.category-products', ['url' => $url]);
    }
}
