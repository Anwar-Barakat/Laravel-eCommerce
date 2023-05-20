<?php

namespace App\Http\Controllers\Admin\ShippingCharge;

use App\Models\ShippingCharge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shipping-chages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingCharge $shippingCharge)
    {
        return view('admin.shipping-chages.edit', ['shippingCharge' => $shippingCharge]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingCharge $shippingCharge)
    {
        //
    }
}
