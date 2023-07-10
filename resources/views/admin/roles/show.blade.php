<x-master-layout>
    @section('pageTitle', __('msgs.details', ['name' => __('setting.role')]))
    @section('breadcrumbTitle', __('msgs.details', ['name' => __('setting.role')]))
    @section('breadcrumbSubtitle', __('setting.role'))

    @livewire('admin.role.role-detail-component', ['role' => $role])
</x-master-layout>
