<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('product.filter')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('product.filter')]))
    @section('breadcrumbSubtitle', __('product.filters'))

    <livewire:admin.filter.add-edit-filter-form id="add-filter-form" />
</x-master-layout>
