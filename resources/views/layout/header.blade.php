<div class="border__wrapper">
    <div class="lines line1"></div>
    <div class="lines line2"></div>
    <div class="lines line3"></div>
</div>

<!-- Banner superior -->
<div id="top-banner">
    <div class="banner-content">
        <a href="{{ $generalConfiguration->banner_link ?: '/contacto' }}">{{ $generalConfiguration->business_fax }}</a>
    </div>
    <button class="close-banner" aria-label="Cerrar banner">✕</button>
</div>

<!-- Start Header Section -->
<header
    class="td_site_header td_style_1 td_type_2 td_sticky_header td_medium td_heading_color js-site-header">

    <div class="td_main_header">
        <div class="container" style="max-width: 1700px;">
            <div class="td_main_header_in">

                <div class="td_main_header_left">
                    <a class="td_site_branding" href="/">
                        <img
                            src="{{ asset('assets/image/web/logo_falas_horizontal.svg') }}"
                            width="210"
                            alt="Logo">
                    </a>
                </div>

                <div class="td_main_header_right">

                    {{-- Idiomas en móvil --}}
                    @if($activeLanguages->count() > 1)
                        <div class="td_mobile_languages">
                            @foreach($activeLanguages as $language)
                                <a
                                    href="{{ route('language', ['locale' => $language->locale]) }}"
                                    class="td_mobile_language_link @if(app()->getLocale() === $language->locale) is-active @endif"
                                    title="{{ $language->name }}">
                                    <img
                                        src="{{ asset('assets/image/web/flags/' . $language->locale . '.png') }}"
                                        alt="{{ $language->name }}">
                                    <span>{{ strtoupper($language->locale) }}</span>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <nav class="td_nav">
                        <div class="td_nav_list_wrap">
                            <div class="td_nav_list_wrap_in">
                                <ul class="td_nav_list">

                                    <li class="menu-item-has-children">
                                        <a href="/servicios/empresas">{{ __('Businesses') }}</a>
                                        <ul>
                                            <li><a href="/cursos">{{ __('Courses for companies') }}</a></li>
                                            <li><a href="/contacto">{{ __('Request a quote') }}</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children td_mega_menu">
                                        <a href="/cursos">{{ __('Courses') }}</a>
                                        <ul class="td_mega_wrapper">

                                            <li class="menu-item-has-children">
                                                <h4>{{ __('Courses for Individuals') }}</h4>
                                                <ul>
                                                    <li><a href="/cursos">{{ __('Extensive Courses') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Intensive Courses') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Pack Courses') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Courses for Erasmus Students') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Courses for Teachers') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Private Classes') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Portuguese for Travel') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Pronunciation Classes') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Portuguese Conversation') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Official Exam Preparation') }}</a></li>
                                                </ul>
                                                <a href="/cursos">{{ __('All Courses for Individuals') }}</a>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <h4>{{ __('Courses for Companies') }}</h4>
                                                <ul>
                                                    <li><a href="/cursos">{{ __('Subsidized Courses (FUNDAE)') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Cross-border Companies') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Customer Service') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Medical Portuguese') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Business Portuguese') }}</a></li>
                                                    <li><a href="/cursos">{{ __('Customized Courses') }}</a></li>
                                                </ul>
                                                <a href="/cursos">{{ __('All Courses for Companies') }}</a>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <h4>{{ __('Free Tests & Levels') }}</h4>
                                                <ul>
                                                    <li><a href="/pagina/niveles-de-portugues">{{ __('Level A1') }}</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">{{ __('Level A2') }}</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">{{ __('Level B1') }}</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">{{ __('Level B2') }}</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">{{ __('Level C1') }}</a></li>
                                                    <li><a href="/pagina/niveles-de-portugues">{{ __('Level C2') }}</a></li>
                                                </ul>
                                                <a href="/pagina/test-de-nivel-de-portugues-gratis">{{ __('Free Portuguese Level Test') }}</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a href="/servicios/particulares">{{ __('Individuals') }}</a></li>
                                    <li><a href="/pagina/quienes-somos">{{ __('About Us') }}</a></li>
                                    <li><a href="/servicios/traducciones">{{ __('Translations') }}</a></li>
                                    <li><a href="/servicios/e-learning">{{ __('E-learning') }}</a></li>
                                    <li><a href="/blog">{{ __('Blog') }}</a></li>
                                    <li><a href="/contacto">{{ __('Contact') }}</a></li>

                                    <li class="hero-buttons" style="padding: 28px 12px;">
                                        <a
                                            href="tel:+34{{ str_replace(' ', '', $generalConfiguration->business_phone) }}"
                                            class="btn btn-green d-flex align-items-center justify-content-center call-us-btn"
                                            style="margin-right: 4px; padding: 11px 15px;">
                                            {{ __('Call us!') }}
                                        </a>
                                    </li>

                                    {{-- Idiomas escritorio --}}
                                    @if($activeLanguages->count() > 1)
                                        <li class="menu-item-has-children td_language_dropdown td_language_dropdown--desktop">
                                            <a href="#">
                                                <img
                                                    src="{{ asset('assets/image/web/flags/' . app()->getLocale() . '.png') }}"
                                                    alt="Idioma">
                                            </a>
                                            <ul style="width:120px;background-color:#dfde98;">
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

                </div>
            </div>
        </div>
    </div>
</header>

{{-- Spacer para evitar salto de contenido --}}
<div class="header-spacer" aria-hidden="true" style="height: 85px;"></div>
