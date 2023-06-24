<x-app-layout>
    @php
        $category = App\Models\Category::where('url', $url)
            ->select('id', 'name', 'meta_title', 'meta_description', 'meta_keywords')
            ->first();
    @endphp

    @section('pageTitle', __('frontend.page_of', ['name' => $category->meta_title]))
    @section('metaDescription', $category->meta_description)
    @section('metaKeywords', $category->meta_keywords)

    @section('pageTitle', __('frontend.products_of', ['name' => $category->name]))
    @section('breadcrumbTitle', __('frontend.products_of', ['name' => $category->name]))
    @section('breadcrumbSubtitle', __('frontend.products_of', ['name' => $category->name]))




    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        @livewire('frontend.shop.category-product-component', ['url' => $url])
        <!--====== End - Section 1 ======-->
    </div>
    <!--====== End - App Content ======-->

</x-app-layout>
