<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddEditBrand extends Component
{
    use WithFileUploads;

    public Brand $brand;

    public $image;

    public function mount(Brand $brand)
    {
        $this->brand    = $brand;
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->brand->save();
            if ($this->image) {
                $this->brand->clearMediaCollection('brands');
                $this->brand->addMedia($this->image)->toMediaCollection('brands');
            }
            toastr()->success(__('msgs.submitted', ['name' => __('product.brand')]));
            return redirect()->route('admin.brands.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.brand.add-edit-brand');
    }

    public function rules()
    {
        return [
            'brand.name'        => ['required', 'string', 'min:3'],
            'brand.is_active'   => ['required', 'boolean'],
        ];
    }
}
