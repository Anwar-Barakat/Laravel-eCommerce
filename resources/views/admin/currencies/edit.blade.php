<x-master-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('order.currency')]))
    @section('breadcrumbTitle', __('msgs.edit', ['name' => __('order.currency')]))
    @section('breadcrumbSubtitle', __('order.currencies'))

    @livewire('admin.currency.add-edit-currency', ['currency' => $currency])
</x-master-layout>
