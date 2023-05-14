<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AddEditBanner extends Component
{
    use WithFileUploads;

    public Banner $banner;

    public $image;

    public function mount(Banner $banner)
    {
        $this->banner    = $banner;
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function generateLink()
    {
        $this->banner->link = Str::slug($this->banner->title, '-');
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->banner->link = Str::slug($this->banner->title, '-');
            $this->banner->save();
            if ($this->image) {
                $this->banner->clearMediaCollection('banners');
                $this->banner->addMedia($this->image)->toMediaCollection('banners');
            }
            toastr()->success(__('msgs.submitted', ['name' => __('product.banner')]));
            return redirect()->route('admin.banners.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.banner.add-edit-banner');
    }

    public function rules()
    {
        return [
            'banner.title'      => ['required', 'string', 'min:3'],
            'banner.link'       => ['required', 'string', 'min:3'],
            'banner.is_active'  => ['required', 'boolean'],
        ];
    }
}
