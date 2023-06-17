<x-master-layout>
    @section('pageTitle', __('msgs.details', ['name' => __('order.order')]))
    @section('breadcrumbTitle', __('msgs.details', ['name' => __('order.order')]))
    @section('breadcrumbSubtitle', __('order.order'))

    @livewire('admin.order.order-detail', ['order' => $order])
</x-master-layout>
