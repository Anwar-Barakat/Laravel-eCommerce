<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('product.products_rating')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('product.products_rating')]))
    @section('breadcrumbSubtitle', __('product.products_rating'))

    @livewire('admin.product-rating.display-product-rating')
</x-master-layout>
