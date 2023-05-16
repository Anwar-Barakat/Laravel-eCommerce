@if (App::getLocale() == 'ar')
    <link href="{{ asset('backend/dist/css/tabler.rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/tabler-flags.rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/tabler-payments.rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/tabler-vendors.rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/demo.rtl.min.css') }}" rel="stylesheet" />
@else
    <link href="{{ asset('backend/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/demo.min.css') }}" rel="stylesheet" />
@endif

@stack('stylesheets')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

<livewire:styles />

<link rel="stylesheet" href="{{ asset('backend/dist/css/custom.css') }}">
