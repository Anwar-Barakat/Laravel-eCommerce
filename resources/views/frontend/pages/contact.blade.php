<x-app-layout>
    @section('pageTitle', __('frontend.page_of', ['name' => __('frontend.contact_us')]))
    @section('breadcrumbTitle', __('frontend.page_of', ['name' => __('frontend.contact_us')]))
    @section('breadcrumbSubtitle', __('frontend.page_of', ['name' => __('frontend.contact_us')]))

    @livewire('frontend.page.contact-component')
</x-app-layout>
