<x-master-layout>
    @section('pageTitle', __('msgs.details', ['name' => __('product.colors')]))
    @section('breadcrumbTitle', __('msgs.details', ['name' => __('product.colors')]))
    @section('breadcrumbSubtitle', __('product.products'))

    @livewire('admin.product.color.add-edit-color', ['product' => $product])
</x-master-layout>
