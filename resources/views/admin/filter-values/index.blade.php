<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('product.filters')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('product.filters')]))
    @section('breadcrumbSubtitle', __('product.filters'))

    @livewire('admin.filter.display-filter')
</x-master-layout>
