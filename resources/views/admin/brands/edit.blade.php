<x-master-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('product.brand')]))
    @section('breadcrumbTitle', __('msgs.edit', ['name' => __('product.brand')]))
    @section('breadcrumbSubtitle', __('section.sections'))

    @livewire('admin.brand.add-edit-brand', ['brand' => $brand])
</x-master-layout>
