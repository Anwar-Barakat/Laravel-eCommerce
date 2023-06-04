<?php

namespace App\View\Components\Front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    public function render(): View|Closure|string
    {
        return view('frontend.layouts.guest-layout');
    }
}
