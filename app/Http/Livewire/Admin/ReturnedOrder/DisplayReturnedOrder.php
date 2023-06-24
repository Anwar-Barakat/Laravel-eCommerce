<?php

namespace App\Http\Livewire\Admin\ReturnedOrder;

use App\Models\OrderReturnItem;
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

    public $returnStatus;

    public function render()
    {
        return view('livewire.admin.returned-order.display-returned-order', ['returnedOrders' => $this->getReturnedOrders()]);
    }

    public function updatedReturnStatus($value)
    {
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
