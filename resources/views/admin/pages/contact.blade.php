<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('setting.contact_us')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('setting.contact_us')]))
    @section('breadcrumbSubtitle', __('setting.pages'))

    @livewire('admin.page.display-contact-component')
</x-master-layout>
