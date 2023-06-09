<?php

namespace App\Http\Controllers\Frontend\ProductDetail;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Product $product)
    {
        $product->load('category');
        return view('frontend.product-details.index', ['product' => $product]);
    }
}
