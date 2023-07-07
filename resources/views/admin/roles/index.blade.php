<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('setting.roles')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('setting.roles')]))
    @section('breadcrumbSubtitle', __('setting.roles'))

    @livewire('admin.role.display-role-component')
</x-master-layout>
