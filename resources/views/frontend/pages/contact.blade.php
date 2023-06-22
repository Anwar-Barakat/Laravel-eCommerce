<x-app-layout>
    @section('pageTitle', 'Rmark - Contact Us')
    @section('metaDescription', 'Contact Rmark customer support. We offer free shipping on orders over $50 and a 100% satisfaction guarantee.')
    @section('metaKeywords', 'rmark, contact us, customer support, ecommerce, shopping')

    @section('breadcrumbTitle', __('frontend.page_of', ['name' => __('frontend.contact_us')]))
    @section('breadcrumbSubtitle', __('frontend.page_of', ['name' => __('frontend.contact_us')]))

    @livewire('frontend.page.contact-component')
</x-app-layout>
