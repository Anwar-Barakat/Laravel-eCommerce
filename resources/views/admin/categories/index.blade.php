<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('category.categories')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('category.categories')]))
    @section('breadcrumbSubtitle', __('category.categories'))

    @livewire('admin.category.display-category')
</x-master-layout>
