<x-app-layout>
    @section('pageTitle', 'Rmark - My Profile')
    @section('metaDescription', 'View your account information and manage your orders on Rmark. We offer free shipping on orders over $50 and a 100% satisfaction guarantee.')
    @section('metaKeywords', 'rmark, profile, account, ecommerce, shopping')

    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">
                                    <a href="{{ route('frontend.home') }}">{{ __('frontend.home') }}</a>
                                </li>
                                <li class="is-marked">
                                    <a href="javascript:;">{{ __('setting.my_profile') }}</a>
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
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">{{ __('frontend.my_profile') }}</h1>

                                        <span class="dash__text u-s-m-b-30">Look all your info, you could customize your profile.</span>
                                        <div class="row">
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">{{ __('frontend.full_name') }}</h2>
                                                <span class="dash__text">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">{{ __('auth.email') }}</h2>
                                                <span class="dash__text">{{ Auth::user()->email }}</span>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">{{ __('setting.mobile') }}</h2>
                                                <span class="dash__text">{{ Auth::user()->mobile }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="dash__link dash__link--secondary u-s-m-b-30">
                                                    <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a>
                                                </div>
                                                <div class="u-s-m-b-16">
                                                    <a class="dash__custom-link btn--e-transparent-brand-b-2" href="{{ route('frontend.profile.edit') }}">{{ __('frontend.edit_profile') }}</a>
                                                </div>
                                                <div>
                                                    <a class="dash__custom-link btn--e-brand-b-2" href="{{ route('frontend.password.change') }}">{{ __('setting.change_password') }}</a>
                                                </div>
                                            </div>
                                        </div>
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
