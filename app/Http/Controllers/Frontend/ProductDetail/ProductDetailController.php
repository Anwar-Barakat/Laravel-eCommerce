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
        $product->load('category:id,name,url,parent_id', 'attributes', 'filters');
        return view('frontend.product-details.index', ['product' => $product]);
    }
}
