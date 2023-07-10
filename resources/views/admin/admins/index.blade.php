<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('setting.admins')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('setting.admins')]))
    @section('breadcrumbSubtitle', __('setting.admins'))

    @livewire('admin.admin.display-admin-component')
</x-master-layout>
