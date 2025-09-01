
<!-- Start Footer Section -->
<footer class="td_footer td_style_1 td_type_3 td_color_4">
    <div class="container">
        <h3 class="td_fs_64 td_white_color mb-0">¡Hablemos!</h3>

        <div class="td_footer_row">

            <!-- Navegación -->
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <h2 class="td_footer_widget_title td_fs_32 td_white_color td_medium td_mb_30">Navegar</h2>
                    <ul class="td_footer_widget_menu">
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="about.html">Conócenos</a></li>
                        <li><a href="courses-grid-with-sidebar.html">Cursos</a></li>
                        <li><a href="translations.html">Traducciones</a></li>
                        <li><a href="elearning.html">E-learning</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contacto</a></li>
                        <li><a href="privacy.html">Política de privacidad</a></li>
                    </ul>
                </div>
            </div>

            <!-- Cursos -->
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <h2 class="td_footer_widget_title td_fs_32 td_white_color td_medium td_mb_30">Cursos</h2>
                    <ul class="td_footer_widget_menu">
                        <li><a href="course-details.html">Cursos Extensivos</a></li>
                        <li><a href="course-details.html">Cursos Intensivos</a></li>
                        <li><a href="course-details.html">Portugués de Negocios</a></li>
                        <li><a href="course-details.html">Portugués Médico</a></li>
                        <li><a href="course-details.html">Clases individuales</a></li>
                        <li><a href="course-details.html">Preparación de exámenes oficiales</a></li>
                        <li><a href="course-details.html">Test de nivel gratuito</a></li>
                    </ul>
                </div>
            </div>

            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <h2 class="td_footer_widget_title td_fs_32 td_white_color td_medium td_mb_30">Cursos</h2>
                    <ul class="td_footer_widget_menu">
                        <li><a href="course-details.html">Cursos Extensivos</a></li>
                        <li><a href="course-details.html">Cursos Intensivos</a></li>
                        <li><a href="course-details.html">Portugués de Negocios</a></li>
                        <li><a href="course-details.html">Portugués Médico</a></li>
                        <li><a href="course-details.html">Clases individuales</a></li>
                        <li><a href="course-details.html">Preparación de exámenes oficiales</a></li>
                        <li><a href="course-details.html">Test de nivel gratuito</a></li>
                    </ul>
                </div>
            </div>



            <!-- Contacto -->
            <div class="td_footer_col">
                <div class="td_footer_widget">
                    <div class="td_footer_address_widget_wrap">
                        <ul class="td_footer_address_widget td_medium td_mp_0">
                            <li><i class="fa-solid fa-phone-volume"></i>
                                <a href="tel:+34622356783">+34 622 356 783</a>
                            </li>
                            <li><i class="fa-solid fa-envelope"></i>
                                <a href="mailto:info@academiafalasportugues.com">info@academiafalasportugues.com</a>
                                <a href="mailto:academiafalasportugues@gmail.com">academiafalasportugues@gmail.com</a>
                            </li>
                            <li><i class="fa-solid fa-location-dot"></i>
                                Calle Rafael Morales, 1, B, 06005
                                <br>Badajoz, España
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


            <div class="td_footer_bottom_in">
                <p class="td_copyright mb-0">
                    © 2025 Fala Português | Todos los derechos reservados
                </p>

                <div class="td_footer_logo">
                    <img src="{{ asset('assets/image/web/logo_falas_circular.svg') }}" width="250" alt="Logo Fala Português">
                </div>

                <div class="td_footer_social_btns td_fs_20">
                    @if(!empty($generalConfiguration->facebook))
                        <a href="{{ $generalConfiguration->facebook }}" class="td_center" target="_blank" aria-label="Facebook de {{ $generalConfiguration->business_name ?? 'Tu Empresa' }}">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    @endif

                    @if(!empty($generalConfiguration->twitter))
                        <a href="{{ $generalConfiguration->twitter }}" class="td_center" target="_blank" aria-label="Twitter (X) de {{ $generalConfiguration->business_name ?? 'Tu Empresa' }}">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    @endif

                    @if(!empty($generalConfiguration->instagram))
                        <a href="{{ $generalConfiguration->instagram }}" class="td_center" target="_blank" aria-label="Instagram de {{ $generalConfiguration->business_name ?? 'Tu Empresa' }}">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    @endif

                    @if(!empty($generalConfiguration->whatsapp))
                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', $generalConfiguration->whatsapp) }}" class="td_center" target="_blank" aria-label="WhatsApp de {{ $generalConfiguration->business_name ?? 'Tu Empresa' }}">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    @endif

                    @if(!empty($generalConfiguration->linkedin))
                        <a href="{{ $generalConfiguration->linkedin }}" class="td_center" target="_blank" aria-label="LinkedIn de {{ $generalConfiguration->business_name ?? 'Tu Empresa' }}">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</footer>
