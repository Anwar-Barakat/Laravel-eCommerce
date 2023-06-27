<?php

namespace App\Http\Livewire\Admin\Product\Attribute;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class AddEditAttribute extends Component
{
    use WithPagination;

    public Product $product;

    public $attribute;

    public function mount(Product $product, ProductAttribute $attribute)
    {
        $this->product      = $product;
        $this->attribute    = $attribute ?? ProductAttribute::make();
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function updatedAttributePrice($value)
    {
        if ($value < $this->product->price) {
            toastr()->info(__('validation.gt.numeric', ['attribute' => __('product.price'), 'value' => $this->product->price]));
            $this->attribute->price = $this->product->price;
        }
    }

    public function updateStatus(ProductAttribute $attr)
    {
        $attr->update(['is_active' => !$attr->is_active]);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->attribute->product_id = $this->product->id;
            $this->attribute->save();
            toastr()->success(__('msgs.created', ['name' => __('product.product_attribute')]));
            $this->reset('attribute');
            $this->attribute = new ProductAttribute();
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.attributes.create', ['product' => $this->product])->with(['error' => $th->getMessage()]);
        }
    }

    public function edit(ProductAttribute $attr)
    {
        $this->attribute = $attr;
    }

    public function delete(ProductAttribute $attr)
    {
        $attr->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('product.product_attribute')]));
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
                Rule::unique('product_attributes', 'size')->where(function ($query) {
                    return $query->where(['product_id' => $this->product->id]);
                })->ignore($this->attribute->id)
            ],
            'attribute.sku'         => [
                'required',
                'min:3',
                Rule::unique('product_attributes', 'sku')->where(function ($query) {
                    return $query->where(['product_id' => $this->product->id]);
                })->ignore($this->attribute->id)
            ]
        ];
    }

    public function getProductAttributes()
    {
        return ProductAttribute::where('product_id', $this->product->id)->paginate(CUSTOMPAGINATION);
    }
}
