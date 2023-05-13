<?php

namespace App\Http\Controllers\Admin\Product\Attachment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DestroyAttachment extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $media = Media::whereId($id)->first();
        $media->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('product.attachment')]));
        return redirect()->back();
    }
}
