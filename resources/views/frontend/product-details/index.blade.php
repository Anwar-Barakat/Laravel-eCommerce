<x-app-layout>
    @section('pageTitle', __('msgs.details', ['name' => $product->name]))
    @section('breadcrumbTitle', __('msgs.details', ['name' => $product->name]))
    @section('breadcrumbSubtitle', __('msgs.details', ['name' => $product->name]))

    <!--====== App Content ======-->
    @livewire('frontend.product-detail.product-detail-component', ['product' => $product])
</x-app-layout>
