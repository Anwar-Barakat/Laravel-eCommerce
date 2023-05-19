<x-master-layout>
    @section('pageTitle', __('msgs.details', ['name' => __('product.filters')]))
    @section('breadcrumbTitle', __('msgs.details', ['name' => __('product.filters')]))
    @section('breadcrumbSubtitle', __('product.filters'))

    @livewire('admin.product.filter.add-edit-filter', ['product' => $product])
</x-master-layout>
