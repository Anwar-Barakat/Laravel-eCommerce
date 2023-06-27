<?php

namespace App\Http\Controllers\Admin\Product\Color;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Product $product)
    {
        return view('admin.products.colors.index', ['product' => $product]);
    }
}
