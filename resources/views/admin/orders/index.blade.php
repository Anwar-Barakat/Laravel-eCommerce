<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('order.orders')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('order.orders')]))
    @section('breadcrumbSubtitle', __('order.orders'))

    @livewire('admin.order.display-order')
</x-master-layout>
