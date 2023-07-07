<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('setting.permissions')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('setting.permissions')]))
    @section('breadcrumbSubtitle', __('setting.permissions'))

    @livewire('admin.permission.display-permission-component')
</x-master-layout>
