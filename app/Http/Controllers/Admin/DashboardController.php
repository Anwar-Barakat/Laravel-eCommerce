<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $orders_options = [
            'chart_title'           => __('order.orders_by_month'),
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Order',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'chart_type'            => 'bar',
            'filter_days'           => 30, // show only last 30 days
            'filter_field'          => 'created_at',
        ];

        $orders = new LaravelChart($orders_options);


        $userss_options = [
            'chart_title'           => __('order.users_by_month'),
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'chart_type'            => 'line',
            'filter_days'           => 30, // show only last 30 days
            'filter_field'          => 'created_at',
        ];

        $users = new LaravelChart($userss_options);


        return view('admin.dashboard', compact('orders', 'users'));
    }
}