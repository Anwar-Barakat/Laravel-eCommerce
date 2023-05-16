<?php

namespace App\Http\Livewire\Admin\Filter;

use App\Models\Filter;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayFilter extends Component
{
    use WithPagination;

    public function updateStatus($filter)
    {
        $filter->update(['is_active' => !$filter->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.filter.display-filter', ['filters' => $this->getFilters()]);
    }

    public function getFilters()
    {
        return Filter::latest()->paginate(CUSTOMPAGINATION);
    }
}
