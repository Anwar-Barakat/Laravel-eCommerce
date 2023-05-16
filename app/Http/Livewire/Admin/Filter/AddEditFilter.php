<?php

namespace App\Http\Livewire\Admin\Filter;

use App\Models\Category;
use App\Models\Filter;
use Livewire\Component;
use Illuminate\Support\Str;

class AddEditFilter extends Component
{
    public Filter $filter;
    public $categories = [];

    public function mount(Filter $filter)
    {
        $this->filter       = $filter;
        $this->categories   = Category::activeParent()->orderBy('parent_id')->get();
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->filter->field = Str::slug(Str::lower($this->filter->name), '_');
            $this->filter->categories   = array_values(array_filter($this->filter->categories));
            $this->filter->save();
            toastr()->success(__('msgs.submitted', ['name' => __('product.filter')]));
            return redirect()->route('admin.filters.index');
        } catch (\Throwable $th) {
            return redirect()->route('admin.filters.index')->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.filter.add-edit-filter');
    }

    public function rules()
    {
        return [
            'filter.name'           => ['required', 'min:3', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'filter.is_active'      => ['required', 'boolean'],
            'filter.categories'     => 'required|array',
            'filter.categories.*'   => 'required',
        ];
    }
}
