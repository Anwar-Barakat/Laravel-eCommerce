<x-master-layout>
    @section('pageTitle', __('msgs.details', ['name' => __('product.attribites')]))
    @section('breadcrumbTitle', __('msgs.details', ['name' => __('product.attribites')]))
    @section('breadcrumbSubtitle', __('product.products'))

    @livewire('admin.product.attribute.add-edit-attribute', ['product' => $product])
</x-master-layout>
