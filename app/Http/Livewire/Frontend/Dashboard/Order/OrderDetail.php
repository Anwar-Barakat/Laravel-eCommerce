<?php

namespace App\Http\Livewire\Frontend\Dashboard\Order;

use App\Models\Order;
use Livewire\Component;

class OrderDetail extends Component
{
    public $order,
        $reason,
        $cancelModal = true;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function cancelOrder()
    {
        $this->validate();
        try {
            if ($this->order->status != 'new' || $this->order->user_id != auth()->id()) {
                toastr()->error(__('msgs.something_went_wrong'));
                return false;
            }

            $this->order->status    = 'cancelled';
            $this->order->save();
            toastr()->info(__('msgs.cancelled', ['name' => __('order.order')]));
            $this->dispatchBrowserEvent('order-cancelled');
        } catch (\Throwable $th) {
            return redirect()->route('frontend.orders.show', ['order' => $this->order])->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.order.order-detail');
    }

    public function rules()
    {
        return [
            'reason' => ['required', 'integer', 'in:1,2,3,4']
        ];
    }
}