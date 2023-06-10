<?php

namespace App\Http\Livewire\Admin\Product\Filter;

use App\Models\Filter;
use App\Models\Product;
use App\Models\ProductFilter;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddEditFilter extends Component
{
    public Product $product;

    public  $productFilter;

    public $filters = [],
        $filter_values = [];

    public function mount(Product $product, ProductFilter $productFilter)
    {
        $this->product          = $product;
        $this->productFilter    = $productFilter ?? ProductFilter::make();

        $filters = Filter::active()->get();
        foreach ($filters as $filter) {
            if (in_array($this->product->category_id, $filter->categories)) {
                $this->filters[] = $filter;
            }
        }
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function updateStatus(ProductFilter $productFilter)
    {
        $productFilter->update(['is_active' => !$productFilter->is_active]);
    }

    public function updatedProductFilterFilterId()
    {
        $filter                 = Filter::with('filter_values')->find($this->productFilter->filter_id);
        $this->filter_values    = $filter->filter_values;
    }

    public function render()
    {
        return view('livewire.admin.product.filter.add-edit-filter', ['productFilters' => $this->getProductFilters()]);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->productFilter->product_id    = $this->product->id;
            $this->productFilter->category_id   = $this->product->category_id;
            $this->productFilter->save();
            toastr()->success(__('msgs.added', ['name' => __('product.filter')]));
            $this->reset('productFilter');
            $this->productFilter = new ProductFilter();
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.filters.create', ['product' => $this->product])->with(['error' => $th->getMessage()]);
        }
    }


    public function edit(ProductFilter $productFilter)
    {
        $this->productFilter    = $productFilter;
        $this->filter_values    = Filter::with('filter_values')->find($productFilter->filter_id)->filter_values;
    }

    public function delete(ProductFilter $productFilter)
    {
        $productFilter->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('product.filter')]));
    }

    public function rules()
    {
        return [
            'productFilter.is_active'   => ['required', 'boolean'],
            'productFilter.filter_id'   => [
                'required',
            ],
            'productFilter.filter_value_id'   => [
                'required',
                Rule::unique('product_filters', 'filter_value_id')->where(function ($query) {
                    return $query->where(['product_id' => $this->product->id]);
                })->ignore($this->productFilter->id)
            ],
        ];
    }

    public function getProductFilters()
    {
        return ProductFilter::where('product_id', $this->product->id)->paginate(CUSTOMPAGINATION);
    }
}
