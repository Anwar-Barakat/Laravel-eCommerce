<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayCoupon extends Component
{
    use WithPagination;

    public function updateStatus($coupon)
    {
        $coupon->update(['is_active' => !$coupon->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.coupon.display-coupon', ['coupons' => $this->getCoupons()]);
    }

    public function getCoupons()
    {
        return Coupon::latest()->paginate(CUSTOMPAGINATION);
    }
}
