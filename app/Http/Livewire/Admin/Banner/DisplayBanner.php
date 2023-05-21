<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayBanner extends Component
{
    use WithPagination;

    public $title,
        $order_by   = 'title',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

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
        return Banner::search(trim($this->title))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
