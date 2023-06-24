<?php

namespace App\Http\Livewire\Frontend\Dashboard\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayOrder extends Component
{
    use WithPagination;

    public $per_page   = CUSTOMPAGINATION;
    public $cancelled;

    public function mount($cancelled = null)
    {
        $this->cancelled    = $cancelled;
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.order.display-order', ['orders' => $this->getUserOrders()]);
    }

    public function getUserOrders()
    {
        return Order::where('user_id', auth()->id())
            ->when($this->cancelled, fn ($q) => $q->where('status', 'cancelled'))
            ->paginate($this->per_page);
    }
}
