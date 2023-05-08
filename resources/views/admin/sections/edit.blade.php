<x-master-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('section.section')]))
    @section('breadcrumbTitle', __('msgs.edit', ['name' => __('section.section')]))
    @section('breadcrumbSubtitle', __('section.sections'))

    @livewire('admin.section.add-edit-section', ['section' => $section])
</x-master-layout>
