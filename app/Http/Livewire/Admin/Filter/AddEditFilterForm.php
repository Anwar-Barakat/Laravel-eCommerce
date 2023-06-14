<?php

namespace App\Http\Livewire\Admin\Filter;

use App\Models\Category;
use App\Models\Filter;
use Livewire\Component;


class AddEditFilterForm extends Component
{
    public Filter $filter;

    public $categories = [];

    public function mount(Filter $filter)
    {
        $this->filter           = $filter;
        $this->categories       = Category::with('subCategories:id,name,parent_id')->select('id', 'name', 'parent_id')->activeParent()->get();
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.admin.filter.add-edit-filter-form');
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->filter->save();

            toastr()->success(__('msgs.submitted', ['name' => __('product.filter')]));
            return redirect()->route('admin.filters.index');
        } catch (\Throwable $th) {
            return redirect()->route('admin.filters.index')->with(['error' => $th->getMessage()]);
        }
    }

    public function rules()
    {
        return [
            'filter.name'           => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'filter.is_active'      => ['required', 'boolean'],
            'filter.categories'     => ['required', 'array'],
            'filter.categories.*'   => ['required', 'integer']
        ];
    }
}
