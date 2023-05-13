<?php

namespace App\Http\Livewire\Admin\Product\Attribute;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddEditAttribute extends Component
{
    public Product $product;

    public ProductAttribute $attribute;

    public function mount(Product $product, ProductAttribute $attribute)
    {
        $this->product      = $product;
        $this->attribute    = $attribute;
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->attribute->product_id = $this->product->id;
            $this->attribute->save();
            toastr()->success(__('msgs.created', ['name' => __('product.product_attribute')]));
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.attributes.create', ['product' => $this->product])->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.product.attribute.add-edit-attribute', ['attributes' => $this->getProductAttributes()]);
    }

    public function rules()
    {
        return [
            'attribute.is_active'   => ['required', 'boolean'],
            'attribute.price'       => ['required', 'numeric', 'between:1,9999'],
            'attribute.stock'       => ['required', 'integer'],
            'attribute.size'        => [
                'required', 'string', 'min:3',
                Rule::unique('product_attributes', 'product_id')->where(function ($query) {
                    return $query->where(['product_id' => $this->product->id]);
                })->ignore($this->attribute->id)
            ],
            'attribute.sku'         => [
                'required',
                'min:3',
                Rule::unique('product_attributes', 'product_id')->where(function ($query) {
                    return $query->where(['product_id' => $this->product->id]);
                })->ignore($this->product->id)
            ]
        ];
    }

    public function getProductAttributes()
    {
        return ProductAttribute::where('product_id', $this->product->id)->paginate(CUSTOMPAGINATION);
    }
}