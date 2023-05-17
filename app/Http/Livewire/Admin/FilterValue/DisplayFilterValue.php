<?php

namespace App\Http\Livewire\Admin\FilterValue;

use App\Models\FilterValue;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayFilterValue extends Component
{
    use WithPagination;

    public function updateStatus($filter_value)
    {
        $filter_value->update(['is_active' => !$filter_value->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.filter-value.display-filter-value', ['filter_values' => $this->getFilterValues()]);
    }

    public function getFilterValues()
    {
        return FilterValue::latest()->paginate(CUSTOMPAGINATION);
    }
}
