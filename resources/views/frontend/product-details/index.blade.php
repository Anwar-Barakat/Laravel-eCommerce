<x-app-layout>
    @section('pageTitle', __('msgs.details', ['name' => $product->meta_title]))
    @section('metaDescription', $product->meta_description)
    @section('metaKeywords', $product->meta_keywords)

    @section('breadcrumbTitle', __('msgs.details', ['name' => $product->name]))
    @section('breadcrumbSubtitle', __('msgs.details', ['name' => $product->name]))

    <!--====== App Content ======-->
    @livewire('frontend.product-detail.product-detail-component', ['product' => $product])
</x-app-layout>
