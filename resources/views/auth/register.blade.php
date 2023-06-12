<x-guest-layout>
    @section('pageTitle', __('auth.register'))

    <div class="app-content">
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
                                    <a href="javascript:;">Signup</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="u-s-p-b-60">
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row row--center">
                        <div class="col-lg-6 col-md-8 u-s-m-b-30">
                            <div class="l-f-o">
                                <div class="l-f-o__pad-box">
                                    <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <form class="l-f-o__form" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="reg-fname">FIRST NAME *</label>
                                                    <input class="input-text input-text--primary-style" type="text" id="reg-fname" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required autofocus autocomplete="first_name">
                                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="reg-lname">LAST NAME *</label>
                                                    <input class="input-text input-text--primary-style" type="text" id="reg-lname" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required autofocus autocomplete="last_name">
                                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-lname">MOBILE *</label>
                                            <input class="input-text input-text--primary-style" type="tel" id="reg-lname" placeholder="Your Phone" name="mobile" value="{{ old('mobile') }}" required autofocus autocomplete="mobile">
                                            <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-email">E-MAIL *</label>
                                            <input class="input-text input-text--primary-style" type="email" id="reg-email" placeholder="Enter E-mail" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="reg-password">PASSWORD *</label>
                                                    <input class="input-text input-text--primary-style" type="password" id="reg-password" placeholder="********" name="password" required autofocus autocomplete="password">
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="reg-password">PASSWORD CONFIRMATION*</label>
                                                    <input class="input-text input-text--primary-style" type="password" id="reg-password" placeholder="********" name="password_confirmation" required autofocus autocomplete="password_confirmation">
                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE</button>
                                        </div>
                                        <a class="gl-link" href="{{ route('frontend.shop') }}">Return to Store</a>
                                    </form>
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
</x-guest-layout>
