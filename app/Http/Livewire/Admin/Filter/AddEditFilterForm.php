<?php

namespace App\Http\Livewire\Admin\Filter;

use App\Models\Category;
use App\Models\Filter;
use Livewire\Component;


class AddEditFilterForm extends Component
{
    public Filter $filter;

    public $categories = [];
    public $selectedCategories = [];

    public function mount(Filter $filter)
    {
        $this->filter               = $filter;
        $this->categories           = Category::with('subCategories:id,name,parent_id')->select('id', 'name', 'parent_id')->activeParent()->get();
        $this->selectedCategories   = $filter->categories ?? [];
    }



    public function submit()
    {
        $this->validate();
        try {
            $this->filter->categories = $this->selectedCategories;
            $this->filter->save();
            toastr()->success(__('msgs.submitted', ['name' => __('product.filter')]));
            return redirect()->route('admin.filters.index');
        } catch (\Throwable $th) {
            return redirect()->route('admin.filters.index')->with(['error' => $th->getMessage()]);
        }
    }


    public function render()
    {
        return view('livewire.admin.filter.add-edit-filter-form');
    }

    public function rules()
    {
        return [
            'filter.name'               => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'filter.is_active'          => ['required', 'boolean'],
            'selectedCategories'        => ['required', 'array'],
        ];
    }
}
