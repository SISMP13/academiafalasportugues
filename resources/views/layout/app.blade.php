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

	
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1NM39TSGFL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1NM39TSGFL');
</script>
	
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
		@media screen and (min-width: 1200px) {
    .td_nav .td_nav_list .td_mega_wrapper {
        width: 1296px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        position: fixed;
        top: 90px !important;
			}
		}
		
.td_site_header.js-site-header {
    transition: 
        transform 1.25s ease !important,
        background-color 1.25s ease !important,
        box-shadow 1.25s ease !important;
    will-change: transform ;
    transform: translateY(0) ;
}
		
		.td_gescout_sticky {
    position: fixed !important; 
    top: 90px;
    opacity: 1;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
    background-color: #fff;
}
		/* --- Idiomas visibles en móvil --- */

.td_mobile_languages {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-left: auto;
}

.td_mobile_language_link {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    text-decoration: none;
    text-transform: uppercase;
    opacity: 0.75;
}

.td_mobile_language_link img {
    width: 18px;
    height: auto;
    display: block;
}

.td_mobile_language_link.is-active {
    font-weight: 600;
    opacity: 1;
}

/* En escritorio: ocultamos el bloque móvil y mostramos el dropdown clásico */
@media (min-width: 992px) {
    .td_mobile_languages {
        display: none;
    }

    .td_language_dropdown--desktop {
        display: block;
    }
}

/* En móvil: mostramos bloque de idiomas y ocultamos dropdown del menú */
@media (max-width: 991.98px) {
    .td_mobile_languages {
        display: flex;
    }

    .td_language_dropdown--desktop {
        display: none;
    }
}

/* --- Comportamiento visual del header con el scroll --- */

.td_site_header.js-site-header {
    /* si el theme ya lo pone sticky/fixed, esto solo refuerza transición */
    transition:
        transform 0.25s ease,
        background-color 0.25s ease,
        box-shadow 0.25s ease;
    will-change: transform;
}

/* Cuando el usuario ha hecho algo de scroll */
.td_site_header.js-site-header.header-scrolled {
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

/* Cuando ocultamos el header al hacer scroll hacia abajo */
.td_site_header.js-site-header.header-hidden {
    transform: translateY(-100%);
}

		
		
		
        /**/

        .call-us-btn {
            gap: 8px; /* Espacio entre icono y texto */
        }

        .call-us-btn .emoji-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            width: 20px;
            height: 20px;
        }

        .call-us-btn .face {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .call-us-btn .face.smile {
            opacity: 1;
            transform: scale(1);
            z-index: 2; /* por encima inicialmente */
        }

        .call-us-btn .face.big-smile {
            opacity: 0;
            transform: scale(0.9);
        }

        .call-us-btn:hover .face.smile {
            opacity: 0;
            transform: scale(1.1);
            z-index: 1;
        }

        .call-us-btn:hover .face.big-smile {
            opacity: 1;
            transform: scale(1);
            z-index: 2;
        }
        /**/

        .footer__contact {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0px;
            margin-top: 8px;
        }

        .footer__contact-p {
            margin: 0 0 -1px 0;
            font-size: 18px;
            line-height: 1.4;
            color: #000;
        }

        .footer__contact-link {
            color: #000;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2px;
        }

        .footer__contact-link:hover {
            text-decoration: underline;
        }

        /**/
        .td_footer_logo{ width: 350px; }
        .td_footer .footer-logo {
            max-width: 350px;
            margin: 0 auto;
            display: block;
        }

        @media (max-width: 768px) {
            .td_footer_row {
                flex-wrap: wrap;
                flex-direction: column;
                gap: 30px;
            }

            .td_footer_widget_menu {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 8px 20px;
                padding: 0;
            }

            .td_footer_widget_menu li a {
                color: #000;
                text-decoration: none;
                font-size: 15px;
                line-height: 1.4;
            }

            .td_footer .footer-logo {
                max-width: 120px;
                margin: 0 auto;
                display: block;
            }

            .td_footer_widget_title {
                text-align: center;
                font-size: 22px;
                margin-bottom: 15px;
            }
        }


        html {
            scroll-behavior: smooth;
        }

        /* --- About Section Mejorada --- */
        .td_shape_section_9 .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        /* Imagen */
        .td_shape_section_9 .col-lg-6 img {
            max-width: 100%;
            border-radius: 12px;
            display: block;
        }

        /* Párrafo */
        .td_shape_section_9 p {
            text-align: justify;
            font-size: 1.1rem;
            line-height: 1.2;
            margin-bottom: 6px;
        }

        /* Lista con checkmarks */
        .td_shape_section_9 ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 30px;
        }

        .td_shape_section_9 ul li {
            font-size: 1.05rem;
            margin-bottom: 12px;
            padding-left: 40px; /* deja espacio para el check circular */
            position: relative;
        }

        .td_shape_section_9 ul li::before {
            content: "✔";
            position: absolute;
            left: 0px;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: transparent;
            color: #a4a22d;
            border: 2px solid #a4a22d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }


        /* Botón */
        .td_shape_section_9 a.td_btn {
            background-color: #a4a22d;
            margin-top: 2rem;
            color: #000000;
            padding: 13px 32px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            border-radius: 18px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease;
        }

        .td_shape_section_9 a.td_btn:hover {
            background-color: #8b8b00;
        }

        /* --- Responsive --- */
        @media (max-width: 992px) {

            .change__cookies {
                position: fixed;
                bottom: 5px;
                left: 11px;
                z-index: 1020;
                background: rgb(179 174 57);
                color: #fff;
                font-size: 0.95rem;
                font-weight: 500;
                letter-spacing: 0.3px;
                padding: 0.45rem 0.9rem;
                border-radius: 999px;

                box-shadow: 0 2px 8px rgba(0,0,0,0.25);

                text-decoration: none;


                text-align: center;

            }

            .change__cookies:hover {
                background: #b1ae45;
                color: #000;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            }

            @media (max-width: 992px) {
                .change__cookies {
                    bottom: 10px;
                    left: 10px;
                    font-size: 1rem;
                    padding: 0.5rem 1rem;
                }
            }

            .td_shape_section_9 .row {
                flex-direction: column;
                text-align: center;
            }

            .td_shape_section_9 h2,
            .td_shape_section_9 p,
            .td_shape_section_9 ul {
                text-align: center;
            }

            .td_shape_section_9 ul {
                margin: 0 auto 20px;
                max-width: 500px;
            }

            .td_shape_section_9 ul li {
                text-align: left;
            }
        }



        .td_footer a:hover{
            background-color: #8b8b00;
        }
        .td_footer.td_style_1.td_type_3 .td_footer_row .td_footer_col:nth-child(3)::before {
            width: 2px;
            border-left: 1px dashed #000000;
            opacity: 0.3;
        }
        .td_footer.td_style_1.td_type_3 .td_footer_address_widget_wrap::before, .td_footer.td_style_1.td_type_3 .td_footer_address_widget_wrap::after {
            border: 1px solid rgb(8 8 8 / 9%);
        }

        .td_footer.td_style_1.td_type_3 .td_footer_address_widget_wrap {
            border: 1px solid rgba(24, 23, 23, 0.1);
            top: 85px;
            right: 10px;
        }
        /**/
        .footer__legal-links {
            display: flex;                 /* Los coloca en una fila */
            flex-wrap: wrap;               /* Por si en móviles no caben todos */
            justify-content: center;       /* Centra horizontalmente */
            gap: 20px;                     /* Espacio entre enlaces */
            padding: 10px 0;
        }

        .footer__legal-links a {
            color: #fff;                   /* Ajusta según el color de tu footer */
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer__legal-links a:hover {
            color: #a4a22d;                /* Color al pasar el ratón (puedes cambiarlo) */
        }


@media (min-width: 1200px) {
    .td_site_header.td_style_1.td_type_2 .td_main_header_right {
        gap: 18px;
    }
}
        body.with-banner {
            padding-top: 40px; /* igual a la altura del banner */
        }

        .course-img {
            height: 350px; /* o el valor que prefieras */
            object-fit: cover;
            width: 100%;
            border-radius: 10px;
        }

        .border__wrapper {
            display: flex;
            width: 100%;
            height: 7px;
            position: relative;
            z-index: 9999;
            top: 0;
        }

        .border__wrapper .lines {
            flex: 1;
        }

        .border__wrapper .lines.line1 {
            background-color: #b4ad39;
        }

        .border__wrapper .lines.line2 {
            background-color: #fd181e;
        }

        .border__wrapper .lines.line3 {
            background-color: black;
        }



        @media screen and (max-width: 1199px) {
            .td_nav .td_nav_list {
                width: 100%;
                padding: 0;
                line-height: 1.6em;

                margin: 2rem 0;
            }

            .td_nav_list_wrap {
                padding-top: 150px;
            }
        }

        /* Forzar tamaño uniforme de imágenes */
        .service-img {
            height: 260px;         /* ajusta según diseño */
            object-fit: cover;
            object-position: center;
        }

        /* Overlay inicial oculto */
        .td_team_thumb .overlay {
            position: absolute;
            inset: 0; /* top:0, right:0, bottom:0, left:0 */
            background: rgba(0,0,0,0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        /* Mostrar overlay en hover */
        .td_team_thumb:hover .overlay {
            opacity: 1;
        }

        /* Botón dentro del overlay */
        .td_team_thumb .overlay .btn {
            background-color: #cddc39; /* verde lima */
            color: #000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .td_team_thumb .overlay .btn:hover {
            background-color: #afb42b;
        }

        .td_team_thumb .overlay {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .td_team_thumb:hover .overlay {
            opacity: 1;
        }


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


        /**/
        #top-banner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background: #000;
            color: #fff;
            text-align: center;
            padding: 8px 40px;
            z-index: 2000;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        #top-banner .close-banner {
            background: none;
            border: none;
            font-size: 18px;
            color: #fff;
            cursor: pointer;
            margin-left: 10px;
        }

        #top-banner.hidden {
            display: none;
        }

        /**/


@media screen and (max-width: 1199px) {
    .td_nav .td_nav_list {
        width: 100%;
        padding: 0;
        line-height: 1.6em;

        margin: 2rem 0;
    }

    .td_nav_list_wrap {
        padding-top: 150px;
    }
}

/* Forzar tamaño uniforme de imágenes */
 .service-img {
     height: 260px;         /* ajusta según diseño */
     object-fit: cover;
     object-position: center;
 }

/* Overlay inicial oculto */
 .td_team_thumb .overlay {
     position: absolute;
     inset: 0; /* top:0, right:0, bottom:0, left:0 */
     background: rgba(0,0,0,0.5);
     opacity: 0;
     transition: opacity 0.3s ease;
 }

/* Mostrar overlay en hover */
 .td_team_thumb:hover .overlay {
     opacity: 1;
 }

/* Botón dentro del overlay */
 .td_team_thumb .overlay .btn {
     background-color: #cddc39; /* verde lima */
     color: #000;
     box-shadow: 0 4px 12px rgba(0,0,0,0.2);
 }
.td_team_thumb .overlay .btn:hover {
    background-color: #afb42b;
}

.td_team_thumb .overlay {
    opacity: 0;
    transition: opacity 0.3s ease;
}
.td_team_thumb:hover .overlay {
    opacity: 1;
}

        .td_site_header.td_style_1 .td_main_header_in {
            height: 95px;
        }


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

        /**/

@media screen and (max-width: 768px) {
    .td_site_header.td_style_1 {
        top: 5px;
    }

    .breadcrumb-wrapper .container .breadcrumb__section .heading h1 {
        font-family: Montserrat, sans-serif;
        font-weight: 500;
        font-size: 1rem;
        position: relative;
        padding: 0.9rem 2rem;
        border: 2px solid #FFFFFF;
        width: fit-content;
    }

    .td_nav_list_wrap {
        padding-top: 109px;
    }

    #top-banner {
        position: static;
        top: 0;
        left: 0;
        width: 100%;
        background: #f6f6f6;
        color: #fff;
        text-align: center;
        padding: 8px 40px;
        z-index: 2000;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .td_shape_section_9 h2 {
        text-align: center;
        font-size: 2rem;
        line-height: 1.6;
        margin-bottom: 6px;
    }

    body.with-banner {
        padding-top: 0px;
    }
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
<a href="/legal/politica-de-privacidad" class="js-lcc-settings-toggle change__cookies">Privacidad</a>
<script type="module" src="{{asset('assets/vendor/fancybox/jquery.fancybox.min.js')}}"></script>

<script src="{{ asset('assets/template/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/template/js/jquery.slick.min.js') }}"></script>
<script src="{{ asset('assets/template/js/odometer.js') }}"></script>
<script src="{{ asset('assets/template/js/gsap.min.js') }}"></script>
<script src="{{ asset('assets/template/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/template/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/template/js/main.js') }}"></script>

{{--<script>
   /* document.querySelector('.close-banner').addEventListener('click', () => {
        document.getElementById('top-banner').classList.add('hidden');
    });
*/
   const banner = document.getElementById('top-banner');
   const closeBtn = document.querySelector('.close-banner');
   const body = document.body;

   // al cargar la página, aplica espacio
   if (banner && !banner.classList.contains('hidden')) {
       body.classList.add('with-banner');
   }

   // cerrar banner
   closeBtn.addEventListener('click', () => {
       banner.classList.add('hidden');
       body.classList.remove('with-banner');
   });


</script>--}}

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const banner = document.getElementById('top-banner');
        const closeBtn = banner?.querySelector('.close-banner');
        const body = document.body;

        // Al cargar la página, añadimos la clase si el banner está visible
        if (banner && !banner.classList.contains('hidden')) {
            body.classList.add('with-banner');
        }

        // Cerrar el banner y eliminar el espacio
        closeBtn?.addEventListener('click', () => {
            banner.classList.add('hidden');
            body.classList.remove('with-banner');
        });
    });
</script>

	<script>
document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.js-site-header');
    if (!header) return;

    let lastScrollY = window.scrollY;
    const headerHeight = header.offsetHeight;
    const HIDE_OFFSET = 20; // pequeño margen para evitar parpadeos

    window.addEventListener('scroll', function () {
        const currentScrollY = window.scrollY;

        // Clase cuando hay algo de scroll (para sombra, fondo, etc.)
        if (currentScrollY > 10) {
            header.classList.add('header-scrolled');
        } else {
            header.classList.remove('header-scrolled');
        }

        // Ocultar al bajar, mostrar al subir
        if (currentScrollY > lastScrollY && currentScrollY > headerHeight + HIDE_OFFSET) {
            // El usuario está bajando: ocultamos el header
            header.classList.add('header-hidden');
        } else {
            // El usuario está subiendo o muy arriba: mostramos el header
            header.classList.remove('header-hidden');
        }

        lastScrollY = currentScrollY;
    });
});
</script>

	
@livewireScripts
@stack('scripts')
@isset($_COOKIE['__cookie_consent'])
    @if($_COOKIE['__cookie_consent']=='true' or $_COOKIE['__cookie_consent']=='2')
        {{-- Google Analytics --}}
    @endif
@endisset
</body>
</html>
