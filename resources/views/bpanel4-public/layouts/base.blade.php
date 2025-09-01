<!doctype html>
{{--
Este archivo incluye el html que será común para todas las vistas de la parte pública: header, footer, los mensajes
flash, etc.

MÓDIFÍCALO PARA ADAPTARLO A TU PROYECTO
--}}
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{asset('assets/favicon.png')}}"/>
    @stack('styles')
    @livewireStyles
    @vite('resources/bpanel4/assets/js/app.public.js')
</head>
<body class="{{ \Illuminate\Support\Str::slug(config('app.name')) }}">
@include('bpanel4-public.partials.header')
<div class="main-container" id="main-container">
    @include('bpanel4-public.partials.flash-alerts')
    {{-- El bloque body usarlo las plantillas que extiendan directamente de esta (fullwidth, regular-page, etc), no las
         plantillas finales. --}}
    @yield('body')
    @include('bpanel4-public.partials.footer')
</div>
@livewireScripts
</body>
</html>
