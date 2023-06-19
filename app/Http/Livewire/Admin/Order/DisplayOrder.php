<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayOrder extends Component
{
    use WithPagination;

    public $name,
        $status,
        $order_by   = 'id',
        $sort_by    = 'desc',
        $per_page   = CUSTOMPAGINATION;

    public function render()
    {
        return view('livewire.admin.order.display-order', ['orders' => $this->getOrders()]);
    }

    public function getOrders()
    {
        return Order::whereHas('user', function ($query) {
            $query->when($this->name, function ($query) {
                return $query->search(trim($this->name));
            });
        })->with('user:id,first_name,last_name,email')
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
