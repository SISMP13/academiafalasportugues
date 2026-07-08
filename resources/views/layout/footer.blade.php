<!-- Start Footer Section -->
<footer class="td_footer td_style_1 td_type_3 td_color_4" style=" background-color: #f4f3f0;">
    <div class="container">
        <h3 class="td_fs_64 td_black_color mb-0">{{ __('Let’s talk!') }}</h3>

        <div class="td_footer_row">

            <!-- Navigation -->
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <h2 class="td_footer_widget_title td_fs_32 td_black_color td_medium td_mb_30">{{ __('Navigate') }}</h2>
                    <ul class="td_footer_widget_menu">
                        <li style="color: black"><a href="/">{{ __('Home') }}</a></li>
                        <li style="color: black"><a href="/pagina/quienes-somos">{{ __('About us') }}</a></li>
                        <li style="color: black"><a href="/cursos">{{ __('Courses') }}</a></li>
                        <li style="color: black"><a href="/blog">{{ __('Blog') }}</a></li>
                        <li style="color: black"><a href="/contacto">{{ __('Contact') }}</a></li>
                        <li style="color: black"><a href="/legal/aviso-legal">{{ __('Legal notice') }}</a></li>
                        <li style="color: black"><a href="/legal/politica-de-cookies">{{ __('Cookie policy') }}</a></li>
                        <li style="color: black"><a href="/legal/politica-de-privacidad">{{ __('Privacy policy') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Services -->
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <a href="/cursos">
                        <h2 class="td_footer_widget_title td_fs_32 td_black_color td_medium td_mb_30">{{ __('Services') }}</h2>
                    </a>
                    <ul class="td_footer_widget_menu">
                        <li style="color: black"><a href="/servicios/empresas">{{ __('Companies') }}</a></li>
                        <li style="color: black"><a href="/servicios/particulares">{{ __('Individuals') }}</a></li>
                        <li style="color: black"><a href="/servicios/traducciones">{{ __('Translations') }}</a></li>
                        <li style="color: black"><a href="/servicios/e-learning">{{ __('E-learning') }}</a></li>
                    </ul>
                </div>
            </div>

            <!-- All courses -->
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <a href="/cursos">
                        <h2 class="td_footer_widget_title td_fs_32 td_black_color td_medium td_mb_30">{{ __('All courses') }}</h2>
                    </a>
                    <ul class="td_footer_widget_menu">
                        <li style="color: black"><a href="/cursos">{{ __('Extensive courses') }}</a></li>
                        <li style="color: black"><a href="/cursos">{{ __('Intensive courses') }}</a></li>
                        <li style="color: black"><a href="/cursos">{{ __('Business Portuguese') }}</a></li>
                        <li style="color: black"><a href="/cursos">{{ __('Medical Portuguese') }}</a></li>
                        <li style="color: black"><a href="/cursos">{{ __('Private lessons') }}</a></li>
                        <li style="color: black"><a href="/cursos">{{ __('Exam preparation') }}</a></li>
                        <li style="color: black"><a
                                href="/pagina/test-de-nivel-de-portugues-gratis">{{ __('Free level test') }}</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact -->
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <div class="td_footer_address_widget_wrap">
                        <ul class="td_footer_address_widget td_medium td_mp_0">
                            <li style="color: black"><i class="fa-solid fa-phone-volume"></i>
                                <a href="tel:+34622356783">+34 622 356 783</a>
                            </li>
                            <li style="color: black"><i class="fa-solid fa-envelope"></i>
                                <a href="mailto:info@academiafalasportugues.com">info@academiafalasportugues.com</a>
                                <a href="mailto:academiafalasportugues@gmail.com">academiafalasportugues@gmail.com</a>
                            </li>
                            <li style="color: black"><i class="fa-solid fa-location-dot"></i>
                                {{ __('Rafael Morales Street, 1, B, 06005') }}<br>{{ __('Badajoz, Spain') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom -->
    <div class="td_footer_bottom td_fs_18">
        <div class="container">
            <div class="py-4"
                 style="display:flex; flex-direction:column; align-items:center; text-align:center; gap:10px;">
                <div class="td_footer_logo">
                    <img src="{{ asset('assets/image/web/logo_falas_circular.svg') }}"
                         alt="Logo Fala Português" class="footer-logo">
                </div>
                <div class="footer__contact">
                    <p class="footer__contact-p" style=" margin-bottom: 1px;" >
                        {{ $generalConfiguration->business_address }}
                        <br>
                        {{$generalConfiguration->footer_description}}
                    </p>

                    @if($generalConfiguration->business_mobile)
                        <a href="tel:+34{{ str_replace(' ', '', $generalConfiguration->business_mobile) }}" class="footer__contact-link">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            (+34) {{ $generalConfiguration->business_mobile }}
                        </a>
                    @endif
              
                    @if($generalConfiguration->business_email)
                        <a href="mailto:{{ $generalConfiguration->business_email }}" class="footer__contact-link">
                            <i class="fa-solid fa-envelope"></i>
                            {{ $generalConfiguration->business_email }}
                        </a>
                    @endif
                </div>


                <div class="td_footer_social_btns td_fs_20" style="display:flex; gap:15px; justify-content:center;">

                    {{-- Facebook --}}
                    <a href="{{ !empty($generalConfiguration->facebook) ? $generalConfiguration->facebook : 'https://facebook.com' }}"
                       target="_blank"
                       aria-label="{{ __('Facebook of') }} {{ $generalConfiguration->business_name ?? 'Your Company' }}">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    {{-- Twitter (X) --}}
                    <a href="{{ !empty($generalConfiguration->twitter) ? $generalConfiguration->twitter : 'https://twitter.com' }}"
                       target="_blank"
                       aria-label="{{ __('Twitter (X) of') }} {{ $generalConfiguration->business_name ?? 'Your Company' }}">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    {{-- Instagram --}}
                    <a href="{{ !empty($generalConfiguration->instagram) ? $generalConfiguration->instagram : 'https://instagram.com' }}"
                       target="_blank"
                       aria-label="{{ __('Instagram of') }} {{ $generalConfiguration->business_name ?? 'Your Company' }}">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    {{-- WhatsApp --}}
                    @php
                        $whatsappNumber = !empty($generalConfiguration->whatsapp)
                            ? preg_replace('/\D+/', '', $generalConfiguration->whatsapp)
                            : '';
                    @endphp
                    <a href="{{ $whatsappNumber ? 'https://wa.me/' . $whatsappNumber : 'https://wa.me' }}"
                       target="_blank"
                       aria-label="{{ __('WhatsApp of') }} {{ $generalConfiguration->business_name ?? 'Your Company' }}">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    {{-- LinkedIn --}}
                    <a href="{{ !empty($generalConfiguration->linkedin) ? $generalConfiguration->linkedin : 'https://linkedin.com' }}"
                       target="_blank"
                       aria-label="{{ __('LinkedIn of') }} {{ $generalConfiguration->business_name ?? 'Your Company' }}">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>

                    {{-- YouTube (opcional) --}}
                    @if(!empty($generalConfiguration->youtube))
                        <a href="{{ $generalConfiguration->youtube }}" target="_blank"
                           aria-label="{{ __('YouTube of') }} {{ $generalConfiguration->business_name ?? 'Your Company' }}">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    @endif

                </div>


                @isset($generalConfiguration->images['Subvenciones'][0])
                    <div class="footer__subvenciones"
                         style="margin-top: 5rem; display:flex; flex-wrap:wrap; justify-content:center; gap:20px;">
                        @foreach($generalConfiguration->images['Subvenciones'] as $image)
                            <div class="footer__subvenciones-item">
                                <img src="{{ $image->mediaModel->getUrl() }}" alt="Logo">
                            </div>
                        @endforeach
                    </div>
                @endisset

                <div class="footer__legal-links">
                    <a style="color: #514d4d;" href="/legal/aviso-legal">Aviso legal</a>
                    <a style="color: #514d4d;" href="/legal/politica-de-cookies">Política de Cookies</a>
                    <a style="color: #514d4d;" href="/legal/politica-de-privacidad">Política de privacidad</a>
                    <a style="color: #514d4d;" href="https://bittacora.com/" target="_blank" rel="noopener noreferrer">Diseño
                        Bittacora</a>
                </div>


            </div>
        </div>

    </div>

    <div class="border__wrapper">
        <div class="lines line1"></div>
        <div class="lines line2"></div>
        <div class="lines line3"></div>
    </div>
</footer>
