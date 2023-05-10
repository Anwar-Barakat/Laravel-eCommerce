<x-master-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('product.product')]))
    @section('breadcrumbTitle', __('msgs.edit', ['name' => __('product.product')]))
    @section('breadcrumbSubtitle', __('product.products'))

    @livewire('admin.product.add-edit-product', ['product' => $product])
</x-master-layout>
