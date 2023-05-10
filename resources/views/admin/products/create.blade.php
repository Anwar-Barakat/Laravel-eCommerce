<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('product.product')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('product.products')]))
    @section('breadcrumbSubtitle', __('product.products'))

    @livewire('admin.product.add-edit-product')
</x-master-layout>
