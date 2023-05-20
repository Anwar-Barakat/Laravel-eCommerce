<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('order.shipping_charge')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('order.shipping_charge')]))
    @section('breadcrumbSubtitle', __('order.orders'))

    @livewire('admin.shipping-charge.display-shipping-charge')
</x-master-layout>
