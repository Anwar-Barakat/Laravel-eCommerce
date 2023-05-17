<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('product.filters_values')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('product.filters_values')]))
    @section('breadcrumbSubtitle', __('product.filters_values'))

    @livewire('admin.filter-value.display-filter-value')
</x-master-layout>
