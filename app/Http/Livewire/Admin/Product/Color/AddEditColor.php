<?php

namespace App\Http\Livewire\Admin\Product\Color;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddEditColor extends Component
{
    public Product $product;

    public $color;

    public function mount(Product $product, ProductColor $color)
    {
        $this->product      = $product;
        $this->color        = $color;
    }

    public function updateStatus(ProductColor $color)
    {
        $color->update(['is_active' => !$color->is_active]);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->color->product_id = $this->product->id;
            $this->color->save();
            toastr()->success(__('msgs.created', ['name' => __('product.product_color')]));
            $this->color = new ProductColor();
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.attributes.create', ['product' => $this->product])->with(['error' => $th->getMessage()]);
        }
    }

    public function edit(ProductColor $color)
    {
        $this->color = $color;
    }

    public function delete(ProductColor $color)
    {
        $color->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('product.product_color')]));
    }

    public function render()
    {
        return view('livewire.admin.product.color.add-edit-color', ['productColors' => $this->getProductColors()]);
    }

    public function rules()
    {
        return [
            'color.is_active'   => ['required', 'boolean'],
            'color.color'        => [
                'required', 'integer',
                Rule::unique('product_colors', 'color')->where(function ($query) {
                    return $query->where(['product_id' => $this->product->id]);
                })->ignore($this->color->id)
            ],
        ];
    }

    public function getProductColors()
    {
        return ProductColor::where('product_id', $this->product->id)->paginate(CUSTOMPAGINATION);
    }
}
