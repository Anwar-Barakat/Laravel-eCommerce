<x-master-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('category.category')]))
    @section('breadcrumbTitle', __('msgs.edit', ['name' => __('category.category')]))
    @section('breadcrumbSubtitle', __('category.categories'))

    @livewire('admin.category.add-edit-category', ['category' => $category])
</x-master-layout>
