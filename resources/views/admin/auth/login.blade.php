<!doctype html>
<html @if (App::getLocale() == 'ar') dir="rtl" @else dir="ltr" @endif>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf_token" value="{{ csrf_token() }}" />
    <title>{{ __('auth.login_to_your_account') }}</title>

    @include('layouts.inc.head')
</head>

<body>
    <script src="{{ asset('backend/dist/js/demo-theme.min.js') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="mb-3">
                            <x-input-label class="form-label" for="email" :value="__('auth.email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <div class="mt-4">
                                <label class="form-label">
                                    {{ __('auth.password') }}
                                    <span class="form-label-description">
                                        @if (Route::has('admin.forget.password.form'))
                                            <a class="underline text-sm text-gray-600  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('admin.forget.password.form') }}">
                                                {{ __('auth.forget_your_password') }}
                                            </a>
                                        @endif
                                    </span>
                                </label>
                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Libs JS -->
    @include('layouts.inc.footer-scripts')
</body>

</html>
