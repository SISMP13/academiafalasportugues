{{--<header class="td_site_header td_style_1 td_type_2 td_sticky_header td_medium td_heading_color">

    --}}{{-- Top Header --}}{{--
    <div class="td_top_header td_heading_bg td_white_color" id="top-banner">
        <div class="container" style="max-width: 1650px;">
            <div class="td_top_header_in">
                <div class="td_top_header_center">
                    NO TE LO PIERDAS!!  Cursos intensivos de portugués online Verano 2025.
                    Reserva tu plaza AQUÍ
                </div>
                <button class="close-banner" onclick="document.getElementById('top-banner').style.display='none'">
                    ✕
                </button>
            </div>
        </div>
    </div>

    <div class="border__wrapper">
        <div class="lines line1"></div>
        <div class="lines line2"></div>
        <div class="lines line3"></div>
    </div>


    --}}{{-- Main Header --}}{{--
    <div class="td_main_header @if(!(Request::url()===config('app.url'))) td_scrolled @endif">
        <div class="container">
            <div class="td_main_header_in">
                <div class="td_main_header_left">
                    <a href="{{ config('app.url') }}" class="logo_normal" style="padding-bottom: 5px;">
                        @isset($generalConfiguration->images['Logo header'][0])
                            <img src="{{ $generalConfiguration->images['Logo header'][0]->mediaModel->getUrl() }}"
                                 width="200" alt="{{ $generalConfiguration->title }}">
                        @else
                            <img src="{{ asset('img/logo.png') }}" width="200" alt="Logo">
                        @endisset
                    </a>
                </div>

                <div class="td_main_header_right">
                    --}}{{-- Menú dinámico --}}{{--
                    @isset($mainMenu)
                        <nav class="td_nav">
                            <ul class="td_nav_list">
                                @foreach($mainMenu->items as $item)
                                    <li>
                                        <a href="{{ $item->link }}" target="{{ $item->target }}"
                                           title="{{ $item->label }}">
                                            {{ $item->label }}
                                        </a>
                                    </li>
                                @endforeach

                                --}}{{-- Idiomas --}}{{--
                                @if($activeLanguages->count() > 1)
                                    <li class="menu-item-has-children td_language_dropdown">
                                        <a href="#">
                                            <img
                                                src="{{ asset('assets/image/web/flags/' . app()->getLocale() . '.png') }}"
                                                alt="Idioma">
                                        </a>
                                        <ul>
                                            @foreach($activeLanguages as $language)
                                                <li>
                                                    <a href="{{ route('language', ['locale' => $language->locale]) }}">
                                                        {{ strtoupper($language->locale) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endisset

                    --}}{{-- Botón menú responsive --}}{{--
                    <button type="button" class="td_circle_btn td_center td_menu_toggle">
                        <img src="{{ asset('assets/image/web/menu-icon.svg') }}" width="25" alt="Menú">
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>--}}


<!-- Banner arriba -->
<div id="top-banner">
    <div class="td_top_header_center" style="position: absolute; top: 12px;">
        NO TE LO PIERDAS!! Cursos intensivos de portugués online Verano 2025.
        Reserva tu plaza AQUÍ
    </div>
    <button class="close-banner"
            onclick="document.getElementById('top-banner').style.display='none';
                 document.querySelector('.border__wrapper').classList.add('no-banner');
                  document.querySelector('.td_site_header').classList.add('no-banner');
                 ">
        ✕
    </button>
</div>

<!-- Tu wrapper -->

    @include('layout.border')


<!-- Start Header Section -->
<header class="td_site_header td_style_1 td_type_2 td_sticky_header td_medium td_heading_color">
    <div class="td_main_header" >
        <div class="container" style="max-width: 1830px;">
            <div class="td_main_header_in" style="height: 110px; padding-top: 13px;">
                <div class="td_main_header_left">
                    <a class="td_site_branding" href="/">
                        <img src="{{ asset('assets/image/web/logo_falas_horizontal.svg') }}" width="230" alt="Logo">
                    </a>
                </div>
                <div class="td_main_header_right">
                    <nav class="td_nav">
                        <div class="td_nav_list_wrap">
                            <div class="td_nav_list_wrap_in">
                                <ul class="td_nav_list">
                                    <!-- Empresas simple -->
                                    <li class="menu-item-has-children">
                                        <a href="/servicios/empresas">Empresas</a>
                                        <ul>
                                            <li><a href="/cursos">Cursos para empresas</a></li>
                                            <li><a href="clients.html">Empresas clientes</a></li>
                                            <li><a href="request-budget.html">Solicitar presupuesto</a></li>
                                        </ul>
                                    </li>

                                    <!-- Mega menú de Cursos -->
                                    <li class="menu-item-has-children td_mega_menu">
                                        <a href="/cursos">Cursos</a>
                                        <ul class="td_mega_wrapper" style="top: 150px !important;">

                                            <!-- Particulares -->
                                            <li class="menu-item-has-children">
                                                <h4>Cursos para Particulares</h4>
                                                <ul>
                                                    <li><a href="/cursos">Cursos Extensivos</a></li>
                                                    <li><a href="/cursos">Cursos Intensivos</a></li>
                                                    <li><a href="/cursos">Cursos en Pack</a></li>
                                                    <li><a href="/cursos">Cursos para Erasmus</a></li>
                                                    <li><a href="/cursos">Cursos para profesorado</a></li>
                                                    <li><a href="/cursos">Clases individuales</a></li>
                                                    <li><a href="/cursos">Portugués para Viajar</a></li>
                                                    <li><a href="/cursos">Clases de Pronunciación</a></li>
                                                    <li><a href="/cursos">Conversación en portugués</a></li>
                                                    <li><a href="/cursos">Preparación de exámenes
                                                            oficiales</a></li>
                                                </ul>
                                                <a href="/cursos">Todos los cursos para
                                                    Particulares</a>
                                            </li>

                                            <!-- Empresas -->
                                            <li class="menu-item-has-children">
                                                <h4>Cursos para Empresas</h4>
                                                <ul>
                                                    <li><a href="/cursos">Cursos Bonificados (FUNDAE)</a>
                                                    </li>
                                                    <li><a href="/cursos">Empresas Transfronterizas</a></li>
                                                    <li><a href="/cursos">Atención al cliente</a></li>
                                                    <li><a href="/cursos">Portugués Médico</a></li>
                                                    <li><a href="/cursos">Portugués de Negocios</a></li>
                                                    <li><a href="/cursos">Cursos Personalizados</a></li>
                                                </ul>
                                                <a href="/cursos">Todos los cursos para
                                                    Empresas</a>
                                            </li>

                                            <!-- Test & Niveles -->
                                            <li class="menu-item-has-children">
                                                <h4>Test & Niveles Gratuitos</h4>
                                                <ul>
                                                    <li><a href="/pagina/niveles-de-portugues">Nivel A1</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">Nivel A2</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">Nivel B1</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">Nivel B2</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">Nivel C1</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">Nivel C2</a></li>
                                                </ul>
                                                <a href="/pagina/test-de-nivel-de-portugues-gratis">Test de nivel de portugués gratis</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <!-- Otros apartados -->
                                    <li><a href="/servicios/particulares">Particulares</a></li>
                                    <li><a href="/pagina/quienes-somos">Conócenos</a></li>
                                    <li><a href="/servicios/traducciones">Traducciones</a></li>
                                    <li><a href="/servicios/e-learning">E-learning</a></li>
                                    <li><a href="/blog">Blog</a></li>
                                    <li><a href="/contacto">Contacto</a></li>

                                    <li class="hero-buttons " style="
                                        padding: 28px 12px;
                                        border-radius: 12px;
                                        text-decoration: none;
                                        font-weight: bold;
                                        display: inline-block;">
                                        <a href="#" class="btn btn-green"
                                           style=" margin-right: 4px; padding: 11px 15px;">Llámanos!</a>
                                    </li>

                                    @if($activeLanguages->count() > 1)
                                        <li class="menu-item-has-children td_language_dropdown">
                                            <a href="#">
                                                <img
                                                    src="{{ asset('assets/image/web/flags/' . app()->getLocale() . '.png') }}"
                                                    alt="Idioma">
                                            </a>
                                            <ul style=" width: 120px; background-color: #dfde98;">
                                                @foreach($activeLanguages as $language)
                                                    <li>
                                                        <a href="{{ route('language', ['locale' => $language->locale]) }}">
                                                            {{ strtoupper($language->locale) }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </nav>
                    <div class="td_hero_icon_btns position-relative">

                        <div class="position-relative">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Section -->
<div class="header-spacer"></div>

