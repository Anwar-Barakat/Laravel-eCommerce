<x-app-layout>
    @section('pageTitle', 'Rmark - Thank You for Your Order')
    @section('metaDescription', 'Thank you for your order on Rmark. We will ship your order as soon as possible.')
    @section('metaKeywords', 'rmark, thank you, order, ecommerce, shopping')


    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">
                                    <a href="{{ route('frontend.home') }}">Home</a>
                                </li>
                                <li class="is-marked">
                                    <a href="javascript:;">{{ __('frontend.thanks') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about">
                                <div class="about__container">
                                    <div class="about__info">
                                        <h2 class="about__h2">Thank you for your order!</h2>
                                        <div class="about__p-wrap">
                                            <p class="about__p">Your order has been placed successfully. Your order number is <span class="text-blue-600 text-bold">#{{ $order->id }}</span></p>
                                            <p class="about__p"> and the grand total is <span class="text-blue-600 text-bold">${{ $order->grand_price }}</span></p>
                                            <p class="about__p">
                                                You can track your order status by logging into your account and clicking on the
                                                <a href="" class="text-blue-600 text-bold">Orders</a>
                                                tab.
                                            </p>
                                            <p class="about__p">Thank you for shopping with us!</p>
                                        </div>
                                        <a class="about__link btn--e-secondary" href="{{ route('frontend.shop') }}" target="_blank">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
</x-app-layout>
