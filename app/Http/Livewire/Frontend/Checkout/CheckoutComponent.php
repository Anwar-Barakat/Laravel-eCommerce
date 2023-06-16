<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $cart_items;

    public $defaultAddress = '';

    protected $listeners = ['updatedUserAddresses'];

    public function updatedUserAddresses()
    {
        $this->defaultAddress = auth()->user()->delivery_addresses->where('is_default', 1)->first();
    }

    public function mount()
    {
        $this->cart_items       = Cart::getCartItems();
        $this->defaultAddress        = auth()->user()->delivery_addresses->where('is_default', 1)->first();
    }

    public function placeOrder()
    {
        auth_check();
        try {
            if (!$this->defaultAddress != '') {
                toastr()->error(__('frontend.select_default_address'));
                return false;
            }
        } catch (\Throwable $th) {
            return redirect()->route('frontend.checkout')->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.checkout.checkout-component');
    }

    public function rules()
    {
        return [
            'payment_method'    => ['required', 'integer'],
        ];
    }
}
