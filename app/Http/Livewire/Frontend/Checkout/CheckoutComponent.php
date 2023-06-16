<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $cart_items;
    public $defaultAddress = '';
    public $order;

    protected $listeners = ['updatedUserAddresses'];

    public function updatedUserAddresses()
    {
        $this->defaultAddress = auth()->user()->delivery_addresses->where('is_default', 1)->first();
    }

    public function mount(Order $order)
    {
        $this->order            = $order ?? Order::make();
        $this->cart_items       = Cart::getCartItems();
        $this->defaultAddress   = auth()->check() ? auth()->user()->delivery_addresses->where('is_default', 1)->first() : '';
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
            $this->order->delivery_address_id   = $this->defaultAddress['id'];
            $this->order->payment_method        = $this->order->payment_gateway == 1 ? 'COD' : 'prepaid';
            $this->order->status                = $this->order->payment_gateway == 1 ? 'new' : 'pending';
            $this->order->grand_price           = $this->cart_items->sum('grand_total');
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
            }

            DB::commit();
            toastr()->success(__('msgs.placed', ['name' => __('order.order')]));

            $this->reset('order');
            $this->order = new Order();
        } catch (\Throwable $th) {
            DB::rollBack();
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
            'order.payment_gateway'    => ['required', 'integer'],
        ];
    }
}
