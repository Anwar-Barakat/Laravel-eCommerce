<x-master-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('product.filter')]))
    @section('breadcrumbTitle', __('msgs.edit', ['name' => __('product.filter')]))
    @section('breadcrumbSubtitle', __('product.filters'))

    @livewire('admin.filter.add-edit-filter', ['filter' => $filter])
</x-master-layout>
