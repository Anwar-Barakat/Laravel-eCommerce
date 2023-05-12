<?php

namespace App\Http\Controllers\Admin\Product\Attachment;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AttachmentController extends Controller
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
        return view('admin.products.attachments.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        if ($request->isMethod('post')) {
            $product = Product::findOrFail($product->id);
            $request->validate([
                'image'             => 'required|array',
                'image.*'           => 'required|image|mimes:jpeg,png,jpg|max:1048',
            ]);

            if ($request->hasFile('image')) {
                $product->addMultipleMediaFromRequest(['image'])->each(function ($image) {
                    $image->toMediaCollection('product_attachments');
                });
            }

            toastr()->success(__('msgs.added', ['name' => __('msgs.attachements')]));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::whereId($id)->first();
        $media->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('product.attachment')]));
        return redirect()->back();
    }
}
