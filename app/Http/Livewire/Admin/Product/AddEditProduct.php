<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddEditProduct extends Component
{
    use WithFileUploads;

    public Product $product;

    public $image, $name_ar, $name_en;

    public $categories = [];

    public function mount(Product $product)
    {
        $this->product      = $product;
        $this->categories   = $product ? Category::where(['section_id' => $product->section_id])->activeParent()->get() : [];
        $this->name_ar      = $product ? $product->getTranslation('name', 'ar') : '';
        $this->name_en      = $product ? $product->getTranslation('name', 'en') : '';
    }

    public function updatedProductSectionId()
    {
        $this->categories = Category::where(['section_id' => $this->product->section_id])->activeParent()->get();
    }

    public function updatedProductGst()
    {
        if ($this->product->gst > 25) {
            $this->product->gst = 0;
            toastr()->error(__('product.must_be_less_than_value', ['name' => __('product.gst'), 'value' => 25]));
        }
    }

    public function updatedProductDiscountValue()
    {
        if ($this->product->discount_type == 0  && $this->product->discount_value > 50) {
            $this->product->discount_value = 0;
            toastr()->error(__('product.must_be_less_than_value', ['name' => __('product.discount'), 'value' => 50]));
        }

        if ($this->product->discount_type == 1 && $this->product->discount_value >  $this->product->price) {
            $this->product->discount_value = 0;
            toastr()->error(__('product.must_be_less_than_value', ['name' => __('product.discount'), 'value' => __('product.price')]));
        }
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->product->name = [
                'ar' => $this->name_ar,
                'en' => $this->name_en,
            ];
            $this->product->save();

            if ($this->image) {
                $this->product->clearMediaCollection('products');
                $this->product->addMedia($this->image)->toMediaCollection('products');
            }

            toastr()->success(__('msgs.submitted', ['name' => __('product.product')]));
            return redirect()->route('admin.products.index');
        } catch (\Throwable $th) {
            return redirect()->route('admin.products.create')->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.product.add-edit-product', [
            'sections'  => Section::latest()->get(),
            'brands'    => Brand::active()->get()
        ]);
    }

    public function rules()
    {
        return [
            'name_ar'                   => [
                'required',
                'string',
                'min:3',
                Rule::unique('products', 'name->ar')->ignore($this->product->id)
            ],
            'name_en'                   => [
                'required', 'string', 'min:3',
                Rule::unique('products', 'name->en')->ignore($this->product->id)
            ],
            'product.section_id'        => ['required', 'integer'],
            'product.category_id'       => ['required', 'integer'],
            'product.brand_id'          => ['required', 'integer'],
            'product.is_active'         => ['required', 'boolean'],
            'product.price'             => ['required', 'numeric'],
            'product.weight'            => ['required', 'numeric'],
            'product.discount_type'     => ['required', 'boolean'],
            'product.discount_value'    => ['required', 'numeric'],
            'product.gst'               => ['required', 'numeric', 'between:0,25'],
            'product.description'       => ['required', 'min:10'],
            'product.meta_title'        => ['required', 'min:10'],
            'product.meta_description'  => ['required', 'min:10'],
            'product.meta_keywords'     => ['required', 'min:10'],
            'product.is_featured'       => ['required', 'boolean'],
            'product.is_best_seller'    => ['required', 'boolean'],

        ];
    }
}

/*
    Arithmatics operations :
    + addition
*/
