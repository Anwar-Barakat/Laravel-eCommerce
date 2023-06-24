<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('order.cancelled_orders')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('order.cancelled_orders')]))
    @section('breadcrumbSubtitle', __('order.cancelled_orders'))

    @livewire('admin.order.display-order', ['cancelled' => $cancelled])
</x-master-layout>
