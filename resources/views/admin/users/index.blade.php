<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('order.users')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('order.users')]))
    @section('breadcrumbSubtitle', __('order.users'))

    @livewire('admin.user.display-user')
</x-master-layout>
