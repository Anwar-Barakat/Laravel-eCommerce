<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('order.currencies')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('order.currencies')]))
    @section('breadcrumbSubtitle', __('order.currencies'))

    @livewire('admin.currency.display-currency')
</x-master-layout>
