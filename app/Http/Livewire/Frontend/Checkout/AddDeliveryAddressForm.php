<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\DeliveryAddress;
use App\Models\ShippingCharge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddDeliveryAddressForm extends Component
{
    public $address,
        $default_address;

    public $charges = 0;

    public function mount(DeliveryAddress $address)
    {
        $this->address = $address ?? DeliveryAddress::make();
        $this->default_address  = Auth::check() ? Auth::user()->delivery_addresses->where('is_default', null)->first() : '';
    }

    public function updatedAddressCountryId($value)
    {
        $this->emit('UpdatedShippingChargesCountry', $value);
    }

    public function render()
    {
        return view('livewire.frontend.checkout.add-delivery-address-form');
    }

    public function submit()
    {
        auth_check();

        $this->validate();
        try {

            $addressDefault = Auth::user()->delivery_addresses->where('is_default', 1)->first();

            if (($this->address->is_default == 1 && $this->address->user_id) && $addressDefault != null) {
                $addressDefault->update(['is_default' => null]);
            }

            $this->address->user_id     = Auth::id();
            $this->address->save();

            toastr()->success(__('msgs.added', ['name' => __('frontend.delivery_address')]));
            $this->emit('updatedUserAddresses', ['addresses' => auth()->user()->delivery_addresses]);

            if (request()->routeIs('frontend.checkout')) {
                $this->reset(['address']);
                $this->address = new DeliveryAddress();
            }
        } catch (\Throwable $th) {
            return redirect()->route('frontend.checkout')->with(['error' => $th->getMessage()]);
        }
    }

    public function rules()
    {
        return [
            'address.is_default'        => ['nullable'],
            'address.first_name'        => ['required', 'min:3', 'max:255'],
            'address.last_name'         => ['required', 'min:3', 'max:255'],
            'address.email'             => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore(auth()->id())
            ],
            'address.mobile'            => ['required', 'min:10', 'max:10'],
            'address.street_address'    => ['required', 'min:3', 'max:255'],
            'address.country_id'        => ['required', 'integer'],
            'address.city'              => ['required', 'min:3', 'max:255'],
        ];
    }
}
