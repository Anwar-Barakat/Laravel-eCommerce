<x-guest-layout>
    @section('pageTitle', __('auth.reset_password'))

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
                                    <a href="javascript:;">Reset Password</a>
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
                                    <h1 class="gl-h1">Reset Your Password</h1>

                                    <form class="l-f-o__form" method="POST" action="{{ route('password.store') }}">
                                        @csrf

                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="email">E-MAIL *</label>
                                            <input class="input-text input-text--primary-style" type="email" id="email" placeholder="Enter E-mail" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="password">PASSWORD *</label>
                                            <input class="input-text input-text--primary-style" type="password" id="password" placeholder="********" name="password" required autocomplete="current-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="confirmation_password">CONFIRMATION PASSWORD *</label>
                                            <input class="input-text input-text--primary-style" type="password" id="confirmation_password" placeholder="********" name="password_confirmation" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">
                                                    {{ __('auth.reset_password') }}
                                                </button>
                                            </div>
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
        <!--====== End - Section 2 ======-->
    </div>
</x-guest-layout>
