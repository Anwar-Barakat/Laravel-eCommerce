<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('product.banners')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('product.banners')]))
    @section('breadcrumbSubtitle', __('product.banners'))

    @livewire('admin.banner.display-banner')
</x-master-layout>
