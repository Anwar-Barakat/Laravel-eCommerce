<x-master-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('order.shipping_charge')]))
    @section('breadcrumbTitle', __('msgs.edit', ['name' => __('order.shipping_charge')]))
    @section('breadcrumbSubtitle', __('order.orders'))

    @livewire('admin.shipping-charge.edit-shipping-charge', ['shippingCharge' => $shippingCharge])
</x-master-layout>
