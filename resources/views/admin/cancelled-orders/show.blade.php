<x-master-layout>
    @section('pageTitle', __('msgs.details', ['name' => __('order.cancelled_order')]))
    @section('breadcrumbTitle', __('msgs.details', ['name' => __('order.cancelled_order')]))
    @section('breadcrumbSubtitle', __('order.cancelled_orders'))

    @livewire('admin.order.order-detail', ['order' => $order, 'cancelled' => $cancelled])
</x-master-layout>
