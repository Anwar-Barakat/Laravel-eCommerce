<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('section.section')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('section.section')]))
    @section('breadcrumbSubtitle', __('section.sections'))

    @livewire('admin.section.add-edit-section')
</x-master-layout>
