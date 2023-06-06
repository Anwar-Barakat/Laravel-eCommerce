<x-app-layout>
    @section('pageTitle', __('frontend.page_of', ['name' => __('frontend.shop')]))
    @section('breadcrumbTitle', __('frontend.page_of', ['name' => __('frontend.shop')]))
    @section('breadcrumbSubtitle', __('frontend.page_of', ['name' => __('frontend.shop')]))

    <!--====== App Content ======-->
    <div class="app-content">
        <!--====== Section 1 ======-->
        @livewire('frontend.shop.display-product-component')
        <!--====== End - Section 1 ======-->
    </div>
    <!--====== End - App Content ======-->

    <!--====== Side Filters ======-->
    @livewire('frontend.shop.side-filter-component')
    <!--====== End - Side Filters ======-->
</x-app-layout>
