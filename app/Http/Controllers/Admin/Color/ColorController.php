<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.colors.index');
    }
}
