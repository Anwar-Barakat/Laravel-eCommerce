@if ($featured_products->count() > 0)

    <div class="u-s-p-y-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">FEATURED PRODUCTS</h1>

                            <span class="section__span u-c-silver">FIND NEW FEATURED PRODUCTS</span>
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
                    @foreach ($featured_products as $product)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                            <x-front-product-block :product="$product" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
@endif
