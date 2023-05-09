<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayBrand extends Component
{
    use WithPagination;

    public function updateStatus($brand_id)
    {
        $brand  = Brand::findOrFail($brand_id);
        $brand->update(['is_active' => !$brand->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.brand.display-brand', ['brands' => $this->getBrands()]);
    }

    public function getBrands()
    {
        return Brand::latest()->paginate(CUSTOMPAGINATION);
    }
}
