<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index,follow">
    <meta name="author" content="Bittacora">
    @yield('metaFields')
    {{-- Favicons --}}
    <link rel="shortcut icon" href="{{ asset('assets/image/web/favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/image/web/favicons/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/image/web/favicons/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/image/web/favicons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/image/web/favicons/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/image/web/favicons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/image/web/favicons/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/image/web/favicons/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/image/web/favicons/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/image/web/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/image/web/favicons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('assets/image/web/favicons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('assets/image/web/favicons/android-icon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ asset('assets/image/web/favicons/android-icon-192x192.png') }}" sizes="192x192">
    {{-- Custom styles --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-pro-5.15.4/css/all.min.css') }}">
    {{-- fancybox --}}
    <link rel="stylesheet" href="{{asset('assets/vendor/fancybox/jquery.fancybox.min.css')}}">
    {{--<script>let cookieAnalytics = "L1XTQJHCT5";</script>--}}
    {{--@vite(['resources/js/web.js', 'resources/bpanel4/assets/js/app.public.js'])--}}
    @vite(['resources/js/web.js','resources/scss/app.scss','resources/bpanel4/assets/js/app.public.js'])

    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/cookie-consent/css/cookie-consent.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    @livewireStyles
    <link rel="stylesheet" href="{{ asset('vendor/cookie-consent/css/cookie-consent.css') }}">

    {{--Template--}}
    <link rel="stylesheet" href="{{ asset('assets/template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/style.css') }}">

    <style>


        .td_page_heading {
            position: relative;
            background-size: cover;
            background-position: center;
        }

        .td_page_heading .overlay {
            position: absolute;
            inset: 0; /* equivale a top:0; right:0; bottom:0; left:0 */
            background-color: rgba(0, 0, 0, 0.5); /* negro con 50% de transparencia */
            z-index: 1;
        }

        .td_page_heading .container {
            position: relative;
            z-index: 2; /* para que el texto quede por encima del overlay */
        }




        .hero-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .btn-green {
            background: #a4a22d;
            color: #000000;
        }

        #top-banner {
            position: fixed;  /* se queda fijo arriba */
            top: 0;
            left: 0;
            width: 100%;
            height: 40px;     /* altura del banner */
            background: #000; /* fondo negro */
            color: #fff;
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 40px;  /* margen lateral */
            box-sizing: border-box;
        }

        .td_site_header {
            margin-top: 40px; /* 💡 desplaza el header justo debajo del banner */
        }

        .td_top_header_center {
            text-align: center;
            flex: 1;
        }

        .close-banner {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: white;
        }

        .close-banner:hover {
            opacity: 0.7;
        }
    </style>
    @stack('styles')
</head>
<body class="h-100 d-flex flex-column">
<div class="mt-auto">
    @include('layout.header')
    <main role="main" id="content">
        @yield('content')
    </main>
    @include('layout.footer')
</div>
<a href="javascript:void(0)" class="js-lcc-settings-toggle change__cookies">Privacidad</a>
<script type="module" src="{{asset('assets/vendor/fancybox/jquery.fancybox.min.js')}}"></script>

<script src="{{ asset('assets/template/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/template/js/jquery.slick.min.js') }}"></script>
<script src="{{ asset('assets/template/js/odometer.js') }}"></script>
<script src="{{ asset('assets/template/js/gsap.min.js') }}"></script>
<script src="{{ asset('assets/template/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/template/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/template/js/main.js') }}"></script>



@livewireScripts
@stack('scripts')
@isset($_COOKIE['__cookie_consent'])
    @if($_COOKIE['__cookie_consent']=='true' or $_COOKIE['__cookie_consent']=='2')
        {{-- Google Analytics --}}
    @endif
@endisset
</body>
</html>
