<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('product.banner')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('product.banner')]))
    @section('breadcrumbSubtitle', __('product.banners'))

    @livewire('admin.banner.add-edit-banner')
</x-master-layout>
