<?php

namespace App\Http\Livewire\Frontend\Dashboard\Order;

use App\Models\Order;
use App\Models\OrderLog;
use App\Models\OrderReturnItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReturnOrderForm extends Component
{
    public $order;
    public OrderReturnItem $return;
    public $order_product, $attrSizes;

    public function mount(Order $order, OrderReturnItem $return)
    {
        $this->order    = $order;
        $this->return   = $return;
    }

    public function updatedReturnProductId($value)
    {
        $product                = Product::findOrFail($value);
        if ($product) {
            $this->order_product    = $this->order->order_products->where('product_id', $product->id)->first();
            $this->attrSizes        = $product->attributes->where('size', '!=', $this->order_product->product_size);
        }
    }

    public function returnOrder()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            // 1- update statis of order's product
            $this->order_product->status = 'return_initiated';
            $this->order_product->save();

            // 2- Store the return request
            $this->return->status       = 'pending';
            $this->return->order_id     = $this->order->id;
            $this->return->user_id      = auth()->id();
            $this->return->save();

            $this->emit('updatedOrderReturnItemStatus', $this->order);
            $this->return = new OrderReturnItem();

            DB::commit();
            toastr()->info(__('msgs.placed', ['name' => __('frontend.return_request')]));
        } catch (\Throwable $th) {
            return redirect()->route('frontend.orders.show', ['order' => $this->order])->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.order.return-order-form');
    }

    public function rules()
    {
        return [
            'return.reason'         => ['required', 'integer', 'in:1,2,3,4,5'],
            'return.product_id'     => ['required', 'integer'],
            'return.product_size'   => ['required', 'string'],
            'return.comment'        => ['required', 'min:10', 'string'],
        ];
    }
}
