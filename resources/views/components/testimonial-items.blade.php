@if($testimonials->isNotEmpty())
    <!-- Start Testimonials Section -->
    <section class="td_gray_bg_9 td_shape_section_10">
        <div class="td_shape_position_3 position-absolute">
            <img src="{{ asset('assets/template/img/home_5/testimonial_shape_1.svg') }}" alt="">
        </div>
        <div class="td_height_120 td_height_lg_80"></div>
        <div class="container">
            <div class="row td_gap_y_40">
                <div class="col-lg-5 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.35s">
                    <div class="td_section_heading td_style_1">
                        <p class="td_section_subtitle_up_2 td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_heading_color td_opacity_6">
                            {{ __("Testimonial") }}
                        </p>
                        <h2 class="td_section_title td_fs_48 td_mb_20">{{ __("Learners Say About Us") }}</h2>
                        <p class="td_section_subtitle td_fs_18 mb-0">
                            {{ __("Discover what our students think about their learning experience with us.") }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="td_full_width">
                        <div class="td_slider td_style_1 td_slider_gap_24 td_remove_overflow">
                            <div class="td_slider_container"
                                 data-autoplay="0"
                                 data-loop="1"
                                 data-speed="800"
                                 data-center="0"
                                 data-variable-width="1"
                                 data-slides-per-view="responsive"
                                 data-xs-slides="2"
                                 data-sm-slides="2"
                                 data-md-slides="2"
                                 data-lg-slides="2"
                                 data-add-slides="3">

                                <div class="td_slider_wrapper">
                                    @foreach($testimonials as $testimonial)
                                        @php
                                            $textoCompleto = $testimonial->text; // mantiene el HTML original
                                            $textoPlano = strip_tags($testimonial->text);
                                            $textoCorto = \Illuminate\Support\Str::words($textoPlano, $wordCount, '...');
                                        @endphp
                                        <div class="td_slide">
                                            <div class="td_testimonial td_style_1 td_type_2 td_white_bg td_radius_5">
                                                {{-- Estrellas --}}
                                                <div class="td_rating td_mb_20" data-rating="5">
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <div class="td_rating_percentage">
                                                        <i class="fa-solid fa-star fa-fw"></i>
                                                        <i class="fa-solid fa-star fa-fw"></i>
                                                        <i class="fa-solid fa-star fa-fw"></i>
                                                        <i class="fa-solid fa-star fa-fw"></i>
                                                        <i class="fa-solid fa-star fa-fw"></i>
                                                    </div>
                                                </div>

                                                {{-- Texto con leer más/leer menos --}}
                                                <blockquote class="td_testimonial_text td_fs_20 td_medium td_heading_color td_mb_30 td_opacity_9"
                                                            data-full="{{ e($textoCompleto) }}"
                                                            data-short="{{ e($textoCorto) }}"
                                                            data-expanded="false">
                                                    {!! $textoCorto !!}
                                                </blockquote>
                                                @if(\Illuminate\Support\Str::wordCount($textoPlano) > $wordCount)
                                                    <button class="link-primary-custom leer-mas-btn fw-bold border-0 bg-transparent">
                                                        {{ __("Read more") }}
                                                    </button>
                                                @endif

                                                {{-- Meta --}}
                                                <div class="td_testimonial_meta td_mb_24">
                                                    <img src="{{ asset('assets/image/web/testimonial.svg') }}" alt="{{ $testimonial->name }}">
                                                    <div class="td_testimonial_meta_right">
                                                        <h3 class="td_fs_20 td_semibold td_mb_2">{{ $testimonial->name }}</h3>
                                                        <p class="td_fs_14 mb-0 td_heading_color td_opacity_7">
                                                            {{ $testimonial->position ?? __("Student") }}
                                                        </p>
                                                    </div>
                                                </div>

                                                {{-- Icono --}}
                                                <span class="td_quote_icon td_accent_color">
                                                    <svg width="66" height="49" viewBox="0 0 66 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.7" d="M59.3083 24.7533L59.5477 23.7101L58.594 24.196C56.8371 25.0911 54.9022 25.6333 52.8104 25.6333C45.7993 25.6333 40.1208 20.0011 40.1208 13.0667C40.1208 6.13225 45.7993 0.5 52.8104 0.5C59.8215 0.5 65.5 6.13225 65.5 13.0667V19.5743C65.5 35.5242 52.4088 48.5 36.2974 48.5C34.7517 48.5 33.5 47.2533 33.5 45.7333C33.5 44.2134 34.7517 42.9667 36.2974 42.9667C47.5163 42.9667 56.9202 35.1632 59.3083 24.7533Z" stroke="currentColor"/>
                                                        <path opacity="0.7" d="M26.3083 24.7533L26.5477 23.7101L25.594 24.196C23.8371 25.0911 21.9022 25.6333 19.8104 25.6333C12.7993 25.6333 7.12077 20.0011 7.12077 13.0667C7.12077 6.13226 12.7993 0.5 19.8104 0.5C26.8215 0.5 32.5 6.13226 32.5 13.0667V19.5743C32.5 35.5242 19.4088 48.5 3.2974 48.5C1.75166 48.5 0.5 47.2533 0.5 45.7333C0.5 44.2134 1.75166 42.9667 3.2974 42.9667C14.5163 42.9667 23.9202 35.1632 26.3083 24.7533Z" stroke="currentColor"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="td_height_40 td_height_lg_30"></div>
                            <div class="td_slider_arrows td_style_1 td_type_2">
                                <div class="td_left_arrow td_accent_bg td_radius_10 td_center td_white_color">
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.00194 6.00024L17.002 6.00024" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.00191 1C6.00191 1 1.00196 4.68244 1.00195 6.00004C1.00194 7.31763 6.00195 11 6.00195 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="td_right_arrow td_accent_bg td_radius_10 td_center td_white_color">
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.002 5.99976L1.00195 5.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.002 11C12.002 11 17.0019 7.31756 17.002 5.99996C17.002 4.68237 12.002 1 12.002 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="td_height_120 td_height_lg_80"></div>
    </section>
    <!-- End Testimonials Section -->
@endif

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.body.addEventListener('click', function (event) {
                if (event.target && event.target.classList.contains('leer-mas-btn')) {
                    const button = event.target;
                    const textElement = button.previousElementSibling;
                    const isExpanded = textElement.dataset.expanded === "true";
                    const fullText = textElement.dataset.full;
                    const shortText = textElement.dataset.short;

                    if (isExpanded) {
                        textElement.innerHTML = shortText; // mantiene formato
                        textElement.dataset.expanded = "false";
                        button.textContent = "{{ __('Read more') }}";
                    } else {
                        textElement.innerHTML = fullText; // mantiene formato
                        textElement.dataset.expanded = "true";
                        button.textContent = "{{ __('Read less') }}";
                    }
                }
            });
        });
    </script>
@endsection
