<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('order.exchanged_orders')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('order.exchanged_orders')]))
    @section('breadcrumbSubtitle', __('order.exchanged_orders'))

    @livewire('admin.exchanged-order.display-exchanged-order')
</x-master-layout>
