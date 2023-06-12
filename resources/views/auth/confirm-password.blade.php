<x-guest-layout>
    @section('pageTitle', __('auth.confirm_password'))

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
                                    <a href="javascript:;">{{ __('auth.confirm_password') }}</a>
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
                    <div class="row row--center">
                        <div class="col-lg-6 col-md-8 u-s-m-b-30">
                            <div class="l-f-o">
                                <div class="l-f-o__pad-box">
                                    <h1 class="gl-h1">{{ __('auth.forget_your_password_not_problem') }}</h1>
                                    <span class="gl-text u-s-m-b-30">
                                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                                    </span>
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form class="l-f-o__form" method="POST" action="{{ route('password.confirm') }}">
                                        @csrf
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="password">PASSWORD *</label>
                                            <input class="input-text input-text--primary-style" type="password" id="password" placeholder="*********" name="password" required autofocus />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <div>
                                            <button class="btn btn--e-transparent-hover-brand-b-2">
                                                {{ __('btns.confirm') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>

    </div>
</x-guest-layout>
