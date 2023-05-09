<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('product.brand')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('product.brands')]))
    @section('breadcrumbSubtitle', __('product.brands'))

    @livewire('admin.brand.add-edit-brand')
</x-master-layout>
