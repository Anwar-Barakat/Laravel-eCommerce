<!DOCTYPE html>
<html @if (App::getLocale() == 'ar') dir="rtl" @else dir="ltr" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>@yield('pageTitle')</title>
    {{-- @vite('resources/css/app.css') --}}

    @include('frontend.layouts.inc.head')
    @livewireStyles
</head>

<body class="text-gray-900 antialiased">
    <div class="preloader is-active">
        <div class="preloader__wrap">
            <img class="preloader__img" src="{{ asset('frontend/dist/images/preloader.png') }}" alt="">
        </div>
    </div>
    <div id="app">
        <!--====== Main Header ======-->
        @livewire('frontend.layout.header-component')
        <!--====== End - Main Header ======-->

        <!--====== App Content ======-->
        {{ $slot }}
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        @include('frontend.layouts.inc.footer-section')
        <!--====== Modal Section ======-->

    </div>
    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    @include('frontend.layouts.inc.footer-scripts')
    @livewireScripts
    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
</body>

</html>
