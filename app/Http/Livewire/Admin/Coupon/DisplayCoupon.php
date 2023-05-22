<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayCoupon extends Component
{
    use WithPagination;

    public $order_by   = 'created_at',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public $expiry_date_from,
        $expiry_date_to;

    public function mount()
    {
        $this->expiry_date_from = date('Y-m-d');
    }

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
        return Coupon::when($this->expiry_date_to, fn ($q) => $q->whereBetween('expiry_date', [$this->expiry_date_from, $this->expiry_date_to]))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
