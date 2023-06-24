<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('order.returned_orders')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('order.returned_orders')]))
    @section('breadcrumbSubtitle', __('order.returned_orders'))

    @livewire('admin.returned-order.display-returned-order')
</x-master-layout>
