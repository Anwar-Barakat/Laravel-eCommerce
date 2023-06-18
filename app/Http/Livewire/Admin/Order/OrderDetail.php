<?php

namespace App\Http\Livewire\Admin\Order;

use App\Mail\Admin\UpdateOrderStatus;
use App\Mail\Admin\CustomerOrderDetailEmail;
use App\Mail\Admin\UpdateOrderStatusEmail;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class OrderDetail extends Component
{
    use WithPagination;

    public Order $order;
    public $orderCases,
        $status;

    public function mount(Order $order)
    {
        $this->order        = $order;
        $this->order->load('delivery_address');
        $this->orderCases   = OrderStatus::active()->get();
        $this->status       = $this->order->status;
    }

    public function updatedStatus($value)
    {
        try {
            DB::beginTransaction();
            $this->order->update(['status' => $value]);

            OrderLog::create([
                'order_id'  => $this->order->id,
                'status'    => $this->order->status
            ]);

            toastr()->success(__('msgs.updated', ['name' => __('order.order_status')]));
            Mail::to($this->order->user->email)->send(new UpdateOrderStatusEmail($this->order));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.orders.show', ['order' => $this->order])->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.order.order-detail', ['orderLogs' => $this->getOrderLogs()]);
    }

    public function getOrderLogs()
    {
        return OrderLog::where('order_id', $this->order->id)->paginate(1);
    }
}
