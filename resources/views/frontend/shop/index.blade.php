<x-app-layout>
    @section('pageTitle', 'Rmark - Shop for the Best Products Online')
    @section('metaDescription', 'Rmark has a wide variety of products to choose from, including fashion, electronics, home & living, beauty, and sports & outdoors. We offer free shipping on orders over $50 and a 100% satisfaction guarantee.')
    @section('metaKeywords', ' rmark, shop, online shopping, ecommerce, fashion, electronics, home & living, beauty, sports & outdoors')

    @section('breadcrumbTitle', __('frontend.page_of', ['name' => __('frontend.shop')]))
    @section('breadcrumbSubtitle', __('frontend.page_of', ['name' => __('frontend.shop')]))

    <!--====== App Content ======-->
    <div class="app-content">
        <!--====== Section 1 ======-->
        @livewire('frontend.shop.display-product-component')
        <!--====== End - Section 1 ======-->
    </div>
    <!--====== End - App Content ======-->
</x-app-layout>
