<x-master-layout>
    @section('pageTitle', __('partials.home'))
    @section('breadcrumbTitle', __('partials.home'))
    @section('breadcrumbSubtitle', __('setting.pages'))

    @livewire('admin.dashboard.dashboard-statistic-component')
</x-master-layout>
