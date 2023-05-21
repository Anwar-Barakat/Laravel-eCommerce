<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('order.currency')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('order.currency')]))
    @section('breadcrumbSubtitle', __('order.currency'))

    @livewire('admin.currency.add-edit-currency')
</x-master-layout>
