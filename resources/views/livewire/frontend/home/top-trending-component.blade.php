<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-16">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">{{ __('frontend.top_trending') }}</h1>

                        <span class="section__span u-c-silver">{{ __('frontend.choose_cat') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-category-container">
                        <div class="filter__category-wrapper">
                            <button class="btn filter__btn filter__btn--style-1 js-checked" type="button" data-filter="*">ALL</button>
                        </div>
                        <div class="filter__category-wrapper">
                            <button class="btn filter__btn filter__btn--style-1 flex gap-1" type="button" data-filter=".{{ $best_seller_category->url }}">
                                <span>{{ strtoupper($best_seller_category->name) }}</span>
                                <p>({{ __('frontend.best_seller') }})</p>
                            </button>
                        </div>
                        @if ($have_discount_category)
                            <div class="filter__category-wrapper">
                                <button class="btn filter__btn filter__btn--style-1 flex gap-1" type="button" data-filter=".{{ $have_discount_category->url }}">
                                    <span>{{ strtoupper($have_discount_category->name) }}</span>
                                    <p>({{ __('product.discount') }})</p>
                                </button>
                            </div>
                        @endif
                        @if ($new_product_category)
                            <div class="filter__category-wrapper">
                                <button class="btn filter__btn filter__btn--style-1 flex gap-1" type="button" data-filter=".{{ $new_product_category->url }}">
                                    <span>{{ strtoupper($new_product_category->name) }}</span>
                                    <p>({{ __('frontend.newest') }})</p>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="filter__grid-wrapper u-s-m-t-30">
                        <div class="row">
                            <!-- Products Best Seller -->
                            @foreach ($best_seller_category->products->shuffle()->take(4) as $product1)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item {{ $best_seller_category->url }}">
                                    <x-front-product-block :product="$product1" />
                                </div>
                            @endforeach

                            <!-- Products Best Seller -->
                            @if ($have_discount_category)
                                @foreach ($have_discount_category->products->shuffle()->take(4) as $product2)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item {{ $have_discount_category->url }}">
                                        <x-front-product-block :product="$product2" />
                                    </div>
                                @endforeach
                            @endif

                            <!-- Products Best Seller -->
                            @if ($new_product_category)

                                @foreach ($new_product_category->products->shuffle()->take(4) as $product3)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item {{ $new_product_category->url }}">
                                        <x-front-product-block :product="$product3" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
