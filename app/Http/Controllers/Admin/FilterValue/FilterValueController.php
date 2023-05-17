<?php

namespace App\Http\Controllers\Admin\FilterValue;

use App\Models\FilterValue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.filter-values.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.filter-values.create');
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
    public function show(FilterValue $filterValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FilterValue $filterValue)
    {
        return view('admin.filter-values.edit', ['filterValue' => $filterValue]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FilterValue $filterValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilterValue $filterValue)
    {
        //
    }
}
