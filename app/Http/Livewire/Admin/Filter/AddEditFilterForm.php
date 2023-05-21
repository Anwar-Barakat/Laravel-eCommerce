<?php

namespace App\Http\Livewire\Admin\Filter;

use App\Models\Category;
use App\Models\Filter;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Illuminate\Support\Str;


class AddEditFilterForm extends Component
{
    public Filter $filtered;

    public $categories = [];

    public function mount(Filter $filter)
    {
        $this->filtered             = $filter;
        $this->filtered->categories = $filter->categories ? array_combine($filter->categories, $filter->categories) : [];
        $this->categories           = Category::select('id', 'name')->active()->orderBy('parent_id')->get();
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
            DB::beginTransaction();

            $this->filtered->field        = Str::slug(Str::lower($this->filtered->name), '_');
            $this->filtered->categories   = array_values(array_filter($this->filtered->categories));
            $this->filtered->save();

            DB::commit();
            toastr()->success(__('msgs.submitted', ['name' => __('product.filter')]));
            return redirect()->route('admin.filters.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.filters.index')->with(['error' => $th->getMessage()]);
        }
    }

    public function rules()
    {
        return [
            'filtered.name'           => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'filtered.is_active'      => ['required', 'boolean'],
            'filtered.categories'     => ['required', 'array'],
            'filtered.categories.*'   => ['required', 'integer']
        ];
    }
}