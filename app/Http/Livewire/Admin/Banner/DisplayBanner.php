<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayBanner extends Component
{
    use WithPagination;

    public function updateStatus(Banner $banner)
    {
        $banner->update(['is_active' => !$banner->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.banner.display-banner', ['banners' => $this->getBanners()]);
    }

    public function getBanners()
    {
        return Banner::latest()->paginate(CUSTOMPAGINATION);
    }
}
