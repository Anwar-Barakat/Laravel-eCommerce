<?php

namespace App\Http\Livewire\Frontend\Dashboard\Order;

use App\Models\Order;
use App\Models\OrderLog;
use App\Models\OrderReturnItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderDetail extends Component
{
    public $order,
        $reason,
        $cancelModal = true;

    public $cancelled;
    public $return, $attrSizes;

    public function mount(Order $order, $cancelled = null)
    {
        $this->order        = $order;
        $this->cancelled    = $cancelled;
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function cancelOrder()
    {
        $this->validate(['reason' => ['required', 'integer', 'in:1,2,3,4']]);
        try {
            if ($this->order->status != 'new' || $this->order->user_id != auth()->id()) {
                toastr()->error(__('msgs.something_went_wrong'));
                return false;
            }

            DB::beginTransaction();

            $this->order->status    = 'cancelled';
            $this->order->save();

            OrderLog::create([
                'order_id'      => $this->order->id,
                'status'        => 'cancelled',
                'reason'        => $this->reason,
                'updated_by'    => "user (" . auth()->user()->full_name . ")"
            ]);

            DB::commit();
            toastr()->info(__('msgs.cancelled', ['name' => __('order.order')]));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('frontend.orders.show', ['order' => $this->order])->with(['error' => $th->getMessage()]);
        }
    }

    public function returnOrder()
    {
        $this->validate();
        try {
        } catch (\Throwable $th) {
            return redirect()->route('frontend.orders.show', ['order' => $this->order])->with(['error' => $th->getMessage()]);
        }
    }

    public function updatedReturnProductId($value)
    {
        $product                = Product::findOrFail($value);
        $selectedSize           = $this->order->order_products->where('product_id', $product->id)->first()->product_size;
        $this->attrSizes        = $product->attributes->where('size', '!=', $selectedSize);
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.order.order-detail');
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
