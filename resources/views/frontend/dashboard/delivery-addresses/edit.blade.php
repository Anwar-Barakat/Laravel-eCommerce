<x-app-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('frontend.delivery_addresses')]))


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
                                    <a href="{{ route('frontend.home') }}">{{ __('frontend.home') }}</a>
                                </li>
                                <li class="is-marked">
                                    <a href="javascript:;">{{ __('frontend.delivery_addresses') }}</a>
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
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            @include('frontend.dashboard.inc.sidebar')

                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                    <div class="dash__pad-2 checkout-f">
                                        <h1 class="dash__h1 u-s-m-b-14">{{ __('msgs.edit', ['name' => __('frontend.delivery_address')]) }}</h1>

                                        <span class="dash__text u-s-m-b-30">We need an address where we could deliver products.</span>

                                        @livewire('frontend.checkout.add-delivery-address-form', ['address' => $delivery_address])
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
    <!--====== End - App Content ======-->
</x-app-layout>
