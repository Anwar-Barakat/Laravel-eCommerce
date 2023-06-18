<?php

namespace App\Http\Livewire\Admin\Order;

use App\Mail\Admin\UpdateOrderStatus;
use App\Mail\Admin\CustomerOrderDetailEmail;
use App\Mail\Admin\UpdateOrderStatusEmail;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class OrderDetail extends Component
{
    public Order $order;
    public $orderCases,
        $status;

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->order->load('delivery_address');
        $this->orderCases   = OrderStatus::active()->get();
        $this->status = $this->order->status;
    }

    public function updatedStatus($value)
    {
        $this->order->update(['status' => $value]);
        toastr()->success(__('msgs.updated', ['name' => __('order.order_status')]));
        Mail::to($this->order->user->email)->send(new UpdateOrderStatusEmail($this->order));
    }

    public function render()
    {
        return view('livewire.admin.order.order-detail');
    }
}
