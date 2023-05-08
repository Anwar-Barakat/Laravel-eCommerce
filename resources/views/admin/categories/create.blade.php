<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('category.category')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('category.category')]))
    @section('breadcrumbSubtitle', __('category.categories'))

    @livewire('admin.category.add-edit-category')
</x-master-layout>
