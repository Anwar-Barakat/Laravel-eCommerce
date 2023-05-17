<?php

namespace App\Http\Livewire\Admin\FilterValue;

use App\Models\Filter;
use App\Models\FilterValue;
use Livewire\Component;

class AddEditFilterValue extends Component
{
    public FilterValue $filter_value;

    public $filters = [];

    public function mount(FilterValue $filter_value)
    {
        $this->filter_value = $filter_value;
        $this->filters      = Filter::active()->get();
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->filter_value->save();
            toastr()->success(__('msgs.submitted', ['name' => __('product.filter_value')]));
            return redirect()->route('admin.filter-values.index');
        } catch (\Throwable $th) {
            return redirect()->route('admin.filter-values.index')->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.filter-value.add-edit-filter-value');
    }

    public function rules()
    {
        return [
            'filter_value.filter_id'      => ['required', 'integer'],
            'filter_value.value'          => ['required', 'min:3', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'filter_value.is_active'      => ['required', 'boolean'],
        ];
    }
}