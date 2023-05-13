<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('product.banners')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('product.banners')]))
    @section('breadcrumbSubtitle', __('product.banners'))

    @livewire('admin.banner.add-edit-banner', ['banner' => $banner])
</x-master-layout>
