<?php

namespace App\Http\Livewire\Admin\ExchangedOrder;

use App\Models\OrderExchangeItem;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayExchangedOrder extends Component
{
    use WithPagination;

    public $name,
        $status,
        $order_by   = 'id',
        $sort_by    = 'desc',
        $per_page   = CUSTOMPAGINATION;

    public $exchangeStatus = '';

    public function render()
    {
        return view('livewire.admin.exchanged-order.display-exchanged-order', ['exchangedOrders' => $this->getExchangedOrders()]);
    }


    public function changeStatus(OrderExchangeItem $request)
    {
        $this->validate(['exchangeStatus' => ['required', 'in:pending,approved,rejected']]);
        try {
            DB::beginTransaction();
            $request->status = $this->exchangeStatus;
            $request->save();

            $orderProduct           = $request->order->order_products->where('product_id', $request->product_id)->first();
            $orderProduct->status   = $this->exchangeStatus;
            $orderProduct->save();

            DB::commit();
            toastr()->success(__('msgs.updated', ['name' => __('setting.status')]));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.returned-orders.index')->with(['error' => $th->getMessage()]);
        }
    }

    public function getExchangedOrders()
    {
        return OrderExchangeItem::whereHas('user', function ($query) {
            $query->when($this->name, function ($query) {
                return $query->search(trim($this->name));
            });
        })
            ->with('user:id,first_name,last_name,email')
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
