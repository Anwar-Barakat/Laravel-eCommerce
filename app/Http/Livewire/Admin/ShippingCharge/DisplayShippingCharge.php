<?php

namespace App\Http\Livewire\Admin\ShippingCharge;

use App\Models\ShippingCharge;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayShippingCharge extends Component
{
    use WithPagination;

    public $country_name,
        $order_by   = 'zero_500g',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public function updateStatus(ShippingCharge $shippingCharge)
    {
        $shippingCharge->update(['is_active' => !$shippingCharge->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.shipping-charge.display-shipping-charge', ['shippingCharges' => $this->getShippingCharges()]);
    }

    public function getShippingCharges()
    {
        return ShippingCharge::whereHas('country', function ($query) {
            $query->when($this->country_name, function ($query) {
                return $query->search(trim($this->country_name));
            });
        })->with('country:id,name')
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
