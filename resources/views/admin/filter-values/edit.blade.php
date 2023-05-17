<x-master-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('product.filter_value')]))
    @section('breadcrumbTitle', __('msgs.edit', ['name' => __('product.filter_value')]))
    @section('breadcrumbSubtitle', __('product.filter_values'))

    @livewire('admin.filter-value.add-edit-filter-value', ['filter_value' => $filterValue])
</x-master-layout>
