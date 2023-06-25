<?php

namespace App\Http\Livewire\Admin\ReturnedOrder;

use App\Models\OrderProduct;
use App\Models\OrderReturnItem;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayReturnedOrder extends Component
{
    use WithPagination;

    public $name,
        $status,
        $order_by   = 'id',
        $sort_by    = 'desc',
        $per_page   = CUSTOMPAGINATION;

    public $returnStatus = '';

    public function render()
    {
        return view('livewire.admin.returned-order.display-returned-order', ['returnedOrders' => $this->getReturnedOrders()]);
    }

    public function changeStatus(OrderReturnItem $request)
    {
        $this->validate(['returnStatus' => ['required', 'in:pending,approved,rejected']]);
        try {
            DB::beginTransaction();
            $request->status = $this->returnStatus;
            $request->save();

            $orderProduct           = $request->order->order_products->where('product_id', $request->product_id)->first();
            $orderProduct->status   = $this->returnStatus;
            $orderProduct->save();

            DB::commit();
            toastr()->success(__('msgs.updated', ['name' => __('setting.status')]));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.returned-orders.index')->with(['error' => $th->getMessage()]);
        }
    }

    public function getReturnedOrders()
    {
        return OrderReturnItem::whereHas('user', function ($query) {
            $query->when($this->name, function ($query) {
                return $query->search(trim($this->name));
            });
        })->with('user:id,first_name,last_name,email')
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
