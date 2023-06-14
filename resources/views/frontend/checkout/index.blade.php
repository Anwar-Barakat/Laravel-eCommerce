<x-app-layout>
    @section('pageTitle', __('frontend.page_of', ['name' => __('frontend.checkout')]))

    <!--====== App Content ======-->
    @livewire('frontend.checkout.checkout-component')
    <!--====== End - App Content ======-->
</x-app-layout>
