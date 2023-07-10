<x-master-layout>
    @section('pageTitle', __('msgs.details', ['name' => __('setting.admin')]))
    @section('breadcrumbTitle', __('msgs.details', ['name' => __('setting.admin')]))
    @section('breadcrumbSubtitle', __('setting.admin'))

    @livewire('admin.admin.admin-detail-component', ['admin' => $admin])
</x-master-layout>
