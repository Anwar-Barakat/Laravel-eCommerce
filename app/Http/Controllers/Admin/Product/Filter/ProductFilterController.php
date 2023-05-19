<?php

namespace App\Http\Controllers\Admin\Product\Filter;

use App\Http\Controllers\Controller;
use App\Models\ProductFilter;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.products.filters.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductFilter  $productFilter
     * @return \Illuminate\Http\Response
     */
    public function show(ProductFilter $productFilter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductFilter  $productFilter
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductFilter $productFilter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\ProductFilter  $productFilter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductFilter  $productFilter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductFilter $productFilter)
    {
        //
    }
}
