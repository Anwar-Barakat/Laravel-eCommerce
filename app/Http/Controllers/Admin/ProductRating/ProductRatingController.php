<?php

namespace App\Http\Controllers\Admin\ProductRating;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.products-rating.index');
    }
}
