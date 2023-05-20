<?php

namespace App\Http\Livewire\Admin\ShippingCharge;

use App\Models\ShippingCharge;
use Livewire\Component;

class EditShippingCharge extends Component
{
    public ShippingCharge $shippingCharge;

    public function mount(ShippingCharge $shippingCharge)
    {
        $this->shippingCharge = $shippingCharge;
    }

    public function render()
    {
        return view('livewire.admin.shipping-charge.edit-shipping-charge');
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->shippingCharge->save();
            toastr()->success(__('msgs.submitted', ['name' => __('order.shipping_charge')]));
            $this->reset('shippingCharge');
        } catch (\Throwable $th) {
            return redirect()->route('admin.shipping-charges.index')->with(['error' => $th->getMessage()]);
        }
    }

    public function rules()
    {
        return [
            'shippingCharge.zero_500g'          => ['required', 'numeric', 'between:1,9999'],
            'shippingCharge._501_1000g'         => ['required', 'numeric', 'between:1,9999'],
            'shippingCharge._1001_2000g'        => ['required', 'numeric', 'between:1,9999'],
            'shippingCharge._2001_5000g'        => ['required', 'numeric', 'between:1,9999'],
            'shippingCharge.above_5000g'        => ['required', 'numeric', 'between:1,9999'],
        ];
    }
}