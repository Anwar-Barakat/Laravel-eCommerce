<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Banner;
use Livewire\Component;

class SliderComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.home.slider-component', ['banners' => $this->getBanners()]);
    }

    public function getBanners()
    {
        return Banner::slider()->get();
    }
}
