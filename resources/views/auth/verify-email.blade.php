<x-guest-layout>
    @section('pageTitle', __('auth.email_verification'))

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
                                    <a href="javascript:;">Email Verification</a>
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
                                    <h1 class="gl-h1">Verify Your Email</h1>
                                    <span class="gl-text u-s-m-b-30">
                                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                    </span>

                                    @if (session('status') == 'verification-link-sent')
                                        <div class="mb-4 font-medium text-sm text-green-600 ">
                                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                        </div>
                                    @endif

                                    <div class="flex justify-between items-center gap-1">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <div>
                                                <button class="btn btn--e-transparent-brand-b-2">
                                                    {{ __('Resend Verification Email') }}
                                                </button>
                                            </div>
                                        </form>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn--e-transparent-hover-brand-b-2">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
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
