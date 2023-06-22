<x-app-layout>
    @section('pageTitle', 'Rmark - Checkout and Complete Your Order')
    @section('metaDescription', 'Checkout and complete your order on Rmark. We offer free shipping on orders over $50 and a 100% satisfaction guarantee.')
    @section('metaKeywords', 'rmark, checkout, complete order, ecommerce, shopping')

    <!--====== App Content ======-->
    @livewire('frontend.checkout.checkout-component')
    <!--====== End - App Content ======-->
</x-app-layout>
