<x-app-layout>
    @section('pageTitle', ' Rmark - View Your Wishlist')
    @section('metaDescription', 'View your wishlist products on Rmark. We offer free shipping on orders over $50 and a 100% satisfaction guarantee.')
    @section('metaKeywords', 'rmark, wishlist, checkout, ecommerce, shopping')

    <!--====== App Content ======-->
    @livewire('frontend.wishlist.display-wishlist-component')
    <!--====== End - App Content ======-->
</x-app-layout>
