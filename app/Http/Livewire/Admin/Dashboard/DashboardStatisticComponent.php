<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use Livewire\Component;

class DashboardStatisticComponent extends Component
{

    public $new_filter, $pending_filter, $in_process_filter, $shipped_filter, $delivered_filter, $cancelled_filter;
    public function render()
    {
        return view('livewire.admin.dashboard.dashboard-statistic-component', [
            'new_orders'            => $this->getNewOrders('new', 'new_filter'),
            'pending_orders'        => $this->getNewOrders('pending', 'pending_filter'),
            'in_process_orders'     => $this->getNewOrders('in_process', 'in_process_filter'),
            'shipped_orders'        => $this->getNewOrders('shipped', 'shipped_filter'),
            'delivered_orders'      => $this->getNewOrders('delivered', 'delivered_filter'),
            'cancelled_orders'      => $this->getNewOrders('cancelled', 'cancelled_filter'),
        ]);
    }

    public function getNewOrders($case, $filter)
    {
        $order_filter   = $this->getFilter($this->{$filter});
        $all_orders     = Order::where('created_at', '>=', $order_filter)->sum('grand_price');
        $new_orders     = Order::where('created_at', '>=', $order_filter)->where('status', $case)->sum('grand_price');
        $new_percent    = $new_orders > 0 ? number_format(($new_orders / $all_orders) * 100, 1) : 0;
        return [
            'value'     => $new_orders,
            'percent'   => $new_percent,
        ];
    }

    public function getFilter($filter)
    {
        $value = null;
        if ($filter == 2)
            $value = now()->subMonth(1);
        elseif ($filter == 3)
            $value = now()->subMonth(3);
        else
            $value = now()->subDays(7);
        return $value;
    }
}