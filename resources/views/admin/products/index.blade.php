<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('product.products')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('product.products')]))
    @section('breadcrumbSubtitle', __('product.products'))

    @livewire('admin.product.display-product')
</x-master-layout>
