<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('product.filter_value')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('product.filter_value')]))
    @section('breadcrumbSubtitle', __('product.filter_values'))

    @livewire('admin.filter-value.add-edit-filter-value')
</x-master-layout>
