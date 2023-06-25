<?php

namespace App\Http\Livewire\Frontend\Dashboard\Order;

use App\Models\Order;
use App\Models\OrderExchangeItem;
use App\Models\OrderLog;
use App\Models\OrderReturnItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReturnOrderForm extends Component
{
    public $order;
    public $order_product, $attrSizes;

    public $type,
        $reason,
        $product_id,
        $required_size,
        $comment;

    public $perpuse = 'Return / Exchange';

    public function mount(Order $order)
    {
        $this->order    = $order;
    }

    public function updatedType($value)
    {
        $this->perpuse = $value  ? 'Exchange' : 'Return';
    }

    public function updatedProductId($value)
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

            $data['order_id']      = $this->order->id;
            $data['user_id']       = auth()->id();
            $data['product_id']    = $this->product_id;
            $data['status']        = 'pending';
            $data['reason']        = $this->reason;
            $data['comment']       = $this->comment;
            $data['product_size']  = $this->order_product->product_size;

            if ($this->type == 0) {
                $this->order_product->status = 'return_initiated';
                $this->order_product->save();

                OrderReturnItem::create($data);
            } else {
                $this->order_product->status = 'exchange_initiated';
                $this->order_product->save();

                $data['required_size']  = $this->required_size;
                OrderExchangeItem::create($data);
            }
            DB::commit();

            $this->emit('updatedOrderReturnItemStatus', $this->order);
            $this->resetExcept(['order']);
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
            'type'           => ['required', 'boolean'],
            'reason'         => ['required', 'integer', 'in:1,2,3,4,5,6,7'],
            'product_id'     => ['required', 'integer'],
            'required_size'  => ['required_if:type,1'],
            'comment'        => ['required', 'min:10', 'string'],
        ];
    }
}
