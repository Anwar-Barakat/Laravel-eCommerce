<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('product.colors')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('product.colors')]))
    @section('breadcrumbSubtitle', __('product.colors'))

    @livewire('admin.color.display-color-component')
</x-master-layout>
