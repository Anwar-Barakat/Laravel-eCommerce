<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Mail\Admin\CustomerOrderDetailEmail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ShippingCharge;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $cart_items;
    public $defaultAddress = '';
    public $order;

    public $country_id;
    public $shipping;
    public $final_price = 0;

    protected $listeners = ['updatedUserAddresses', 'UpdatedShippingChargesCountry'];

    public function updatedUserAddresses()
    {
        $this->defaultAddress = auth()->user()->delivery_addresses->where('is_default', 1)->first();
    }

    public function UpdatedShippingChargesCountry($country_id)
    {
        $this->country_id   = $country_id;
        $this->shipping     = $this->getShippingCharges($country_id);
        $this->final_price  = $this->cart_items->sum('grand_total') +  $this->shipping['value'];
    }

    public function mount(Order $order)
    {
        $this->order            = $order ?? Order::make();
        $this->cart_items       = Cart::getCartItems();
        $this->defaultAddress   = auth()->check() ? (auth()->user()->delivery_addresses->where('is_default', 1)->first() ?? 0) : '';

        if ($this->defaultAddress) {
            $this->shipping     = $this->getShippingCharges($this->defaultAddress->country_id);
            $this->final_price  = $this->cart_items->sum('grand_total') +  $this->shipping['value'];
        } else
            $this->final_price      = $this->cart_items->sum('grand_total');
    }

    public function placeOrder()
    {
        auth_check();
        $this->validate();
        try {
            if (!$this->defaultAddress != '') {
                toastr()->error(__('frontend.select_default_address'));
                return false;
            }

            if (!auth()->user()->cart_items->count() > 0) {
                toastr()->info(__('frontend.cart_is_empty'));
                return redirect()->route('frontend.shop');
            }

            DB::beginTransaction();

            $this->order->user_id               = auth()->id();
            $this->order->shipping_charges      = $this->shipping['value'];
            $this->order->delivery_address_id   = $this->defaultAddress['id'];
            $this->order->payment_method        = $this->order->payment_gateway == 1 ? 'COD' : 'prepaid';
            $this->order->status                = $this->order->payment_gateway == 1 ? 'new' : 'pending';
            $this->order->grand_price           = $this->final_price;
            $this->order->save();

            foreach ($this->cart_items as $cart_item) {
                OrderProduct::create([
                    'user_id'       => auth()->id(),
                    'order_id'      => $this->order->id,
                    'product_id'    => $cart_item->product->id,
                    'qty'           => $cart_item->qty,
                    'product_size'  => $cart_item->size,
                    'product_price' => $cart_item->unit_price,
                    'grand_price'   => $cart_item->grand_total,
                ]);

                // reduce products inventory when order placed
                $attr = $cart_item->product->attributes->where('size', $cart_item->size)->first();
                if ($attr->stock < $cart_item->qty) {
                    toastr()->error(__('validation.qty_not_available_now'));
                    return false;
                }
                $attr->update(['stock' => $attr->stock - $cart_item->qty]);
            }

            DB::commit();

            Mail::to(auth()->user()->email)->send(new CustomerOrderDetailEmail($this->order));

            toastr()->success(__('msgs.placed', ['name' => __('order.order')]));
            return redirect()->route('frontend.thanks', ['order' => $this->order]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('frontend.checkout')->with(['error' => $th->getMessage()]);
        }
    }


    // public function applyCoupon()
    // {
    //     auth_check();
    //     $coupon = Coupon::where('code', $this->coupon)->first();

    //     if (!$coupon) {
    //         toastr()->info(__('frontend.coupon_not_found'));
    //         $this->reset('coupon');
    //         return false;
    //     }

    //     if ($coupon->expiry_date < date('Y-m-d')) {
    //         toastr()->info(__('frontend.coupon_has_expired'));
    //         return false;
    //     }
    // }

    public function render()
    {
        return view('livewire.frontend.checkout.checkout-component');
    }

    public function rules()
    {
        return [
            'order.payment_gateway'    => ['required', 'integer'],
        ];
    }

    public function getShippingCharges()
    {
        if ($this->defaultAddress)
            $country_id = $this->defaultAddress['country_id'];

        elseif ($this->country_id)
            $country_id = $this->country_id;

        return ShippingCharge::calcShippingCharges($country_id);
    }
}