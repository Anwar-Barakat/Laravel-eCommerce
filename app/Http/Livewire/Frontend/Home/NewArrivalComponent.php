<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Product;
use Livewire\Component;

class NewArrivalComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.home.new-arrival-component', ['new_arrivals' => $this->getProductsNewArrival()]);
    }

    public function getProductsNewArrival()
    {
        return Product::orderBy('id', 'desc')->take(6)->get();
    }
}
