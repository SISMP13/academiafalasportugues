@extends('layout.app')

@section('metaFields')
    @livewire('meta-fields',
    [
    'metaTitle' => $model->meta_title,
    'metaDescription' => $model->meta_description,
    'metaKeywords' => $model->meta_keywords,
    'pagina/'.$model->slug,
    'socialImage' => $model->images["Imagen social"][0] ?? $generalConfiguration->images['Imagen social'][0]
    ])
@endsection

@push('styles')
    <style>

        @media (min-width: 991px) {
            .td_image_box.td_style_6.td_type_1 .td_image_box_img_2 {
                bottom: -96px;
            }

            .td_image_box.td_style_6 .td_image_box_img_2 {
                padding-left: 19%;
            }

            .td_image_box.td_style_6 .td_image_box_img_1 {
                padding-right: 7%;
            }
        }


        .form-container h2 {
            text-align: center;
            font-family: "Arial", sans-serif;
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #000000;
        }



    </style>
@endpush

@section('content')
    <!-- Start Portada Pagina -->
    @isset($model->images["Portada"][0])
        <section class="td_page_heading td_center td_bg_filed td_heading_bg text-center td_hobble"
                 style="background-image: url('{{ $model->images["Portada"][0]->mediaModel->getUrl() }}')">
            <div class="overlay"></div>
            <div class="container position-relative">
                <div class="td_page_heading_in">
                    <h1 class="td_white_color td_fs_48 td_mb_10">{{ $model->title }}</h1>
                    <ol class="breadcrumb m-0 td_fs_20 td_opacity_8 td_semibold td_white_color">
                        <li class="breadcrumb-item">
                            <a href="{{ config('app.url') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $model->title }}</li>
                    </ol>
                </div>
            </div>
        </section>
    @else
        <section class="td_page_heading td_center text-center td_hobble">
            <div class="container">
                <div class="td_page_heading_in">
                    <h1 class="td_white_color td_fs_48 td_mb_10">{{ $model->title }}</h1>
                    <ol class="breadcrumb m-0 td_fs_20 td_opacity_8 td_semibold td_white_color">
                        <li class="breadcrumb-item">
                            <a href="{{ config('app.url') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $model->title }}</li>
                    </ol>
                </div>
            </div>
        </section>
    @endisset
    <!-- End Portada Pagina -->


    <!-- Start Contenido Página -->
    <section>
        <div class="td_height_120 td_height_lg_80"></div>
        <div class="container">
            <div class="row align-items-center td_gap_y_40">

                {{-- Columna de imágenes con estilo plantilla --}}
                <div class="col-lg-6">
                    <div class="td_image_box td_style_6 td_type_1">

                        {{-- Imagen principal --}}
                        <div class="td_image_box_img_1 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                            @if(isset($model->images['Imagen destacada'][0]))
                                <img src="{{ $model->images['Imagen destacada'][0]->mediaModel->getUrl() }}"
                                     alt="{{ $model->images['Imagen destacada'][0]->mediaModel->name }}">
                            @else
                                <img src="{{ asset('assets/image/web/1.jpeg') }}" alt="{{ $model->title }}">
                            @endif
                        </div>

                        {{-- Imagen secundaria con overlay video --}}
                        <div class="td_image_box_img_2 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                            <div class="td_image_box_img_2_in">
                                @if(isset($model->images['Imagen destacada'][1]))
                                    <img src="{{ $model->images['Imagen destacada'][1]->mediaModel->getUrl() }}"
                                         alt="{{ $model->images['Imagen destacada'][1]->mediaModel->name }}">
                                @else
                                    <img src="{{ asset('assets/image/web/2.jpeg') }}" alt="{{ $model->title }}">
                                @endif

                                {{-- Botón de video dinámico --}}
                                @if(!empty($model->video_url))
                                    <a href="{{ $model->video_url }}" class="td_video_open">
                                        <span class="td_player_btn td_center"><span></span></span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- Shapes decorativos (se pueden dejar fijos o dinámicos) --}}
                        <div class="td_image_box_shape_1 position-absolute"></div>
                        <div class="td_image_box_shape_2 position-absolute">
                            <img src="{{ asset('assets/template/img/home_5/about_shape_2.svg') }}" alt="">
                        </div>
                        <div class="td_image_box_shape_3 position-absolute td_accent_color">
                            <img src="{{ asset('assets/template/img/home_7/about_shape_3.svg') }}" alt="">
                        </div>
                    </div>
                </div>

                {{-- Columna de textos principales --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                    <div class="td_section_heading td_style_1 td_mb_30">

                        @if(!empty($model->subtitle))
                            <p class="td_section_subtitle_up td_fs_18 td_medium td_spacing_1 td_mb_10 td_accent_color">
                                {{ $model->subtitle }}
                            </p>
                        @endif

                        @if(!empty($model->title))
                            <h2 class="td_section_title td_fs_48 td_mb_30">{{ $model->title }}</h2>
                        @endif

                        @if(!empty($model->title))
                            {!! $model->text !!}
                        @endif

                        @if(!empty($model->title_2))
                            <h3 class="td_section_title td_fs_28 td_mb_20">{{ $model->title_2 }}</h3>
                        @endif

                        @if(!empty($model->long_text))
                            {!! $model->long_text !!}
                        @endif

                    </div>

                </div>

            </div>
        </div>

        {{--<div class="header-spacer"></div>--}}


        {{-- Start Why Choose Us Section Dinámico --}}
        @if(!empty($model->title_3) || !empty($model->long_text_2) || !empty($model->title_4))
            <section class="td_gray_bg_6">
                <div class="td_height_120 td_height_lg_80"></div>
                <div class="container">
                    <div class="row align-items-center td_gap_y_40">

                        {{-- Columna de textos (izquierda) --}}
                        <div class="col-lg-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <div class="td_pr_20">
                                <div class="td_section_heading td_style_1 td_mb_30">

                                    @if(!empty($model->title_3))
                                        <p class="td_section_subtitle_up td_fs_18 td_medium td_spacing_1 td_mb_10 td_accent_color">{{ $model->title_3 }}</p>
                                    @endif

                                    @if(!empty($model->title_4))
                                        <h2 class="td_section_title td_fs_48 td_mb_24">{{ $model->title_4 }}</h2>
                                    @endif

                                    @if(!empty($long_text_2 ?? $model->long_text_2))
                                        <p class="td_section_subtitle td_fs_18 mb-0">
                                            {!! $model->long_text_2 !!}
                                        </p>
                                    @endif
                                </div>

                                {{-- Lista dinámica con íconos si quieres (puedes mapear los items) --}}
                                <div class="td_mb_40">
                                    <ul class="td_list td_style_2 td_fs_20 td_medium td_heading_color td_mp_0">
                                        @if(!empty($model->list_items))
                                            @foreach($model->list_items as $item)
                                                <li>
                                                    <svg class="td_accent_color" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="12" cy="12" r="12" fill="currentColor"/>
                                                        <path
                                                            d="M7.5 14.1136C7.5 14.1136 8.52273 14.1136 9.88636 16.5C9.88636 16.5 13.6765 10.25 17.0455 9"
                                                            stroke="white" stroke-width="0.8" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                    </svg>
                                                    {{ $item }}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Columna de imagen (derecha) --}}
                        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="td_pl_65">
                                @if(isset($model->images['Imagen social'][0]))
                                    <img src="{{ $model->images['Imagen social'][0]->mediaModel->getUrl() }}"
                                         alt="{{ $model->images['Imagen social'][0]->mediaModel->name }}">
                                @else
                                    <img src="{{ asset('assets/template/img/home_7/why_chose_us_thumb.jpg') }}"
                                         alt="{{ $model->title }}">
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div class="td_height_120 td_height_lg_80"></div>
            </section>
        @endif
        {{-- End Why Choose Us Section --}}

        {{-- Bloque centrado solo para text2 --}}
        @if(!empty($model->text2) || !empty($model->long_text_3))
            <div class="td_height_120 td_height_lg_80"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <p>{!! $model->long_text_3 !!}</p>
                        <p>{!! $model->text2 !!}</p>
                    </div>
                </div>
            </div>
        @endif


        <div class="td_height_120 td_height_lg_80"></div>
    </section>
    <!-- End Contenido Página -->
    @if($model->id == 1)
        <div class="container-custom2">
            <x-service-list class="service__slider-glide"/>
        </div>
    @endif

    {{-- Mostramos enlace al test solo si la página es la #3 --}}
    @if($model->id == 3 || $model->id == 1)
        {{-- Start Test Banner Section --}}
        <section class="td_shape_section_9 td_hobble">
            {{-- Shapes decorativos --}}
            <div class="td_shape_position_6 position-absolute td_hover_layer_3">
                <img src="{{ asset('assets/template/img/home_3/instructure_shape_1.png') }}" alt="">
            </div>
            <div class="td_shape_position_7 position-absolute td_hover_layer_5">
                <img src="{{ asset('assets/template/img/home_3/instructure_shape_2.png') }}" alt="">
            </div>
            <div class="td_shape_position_8 position-absolute td_hover_layer_3">
                <img src="{{ asset('assets/template/img/home_3/instructure_shape_3.png') }}" alt="">
            </div>
            <div class="td_shape_position_9 position-absolute td_hover_layer_5">
                <img src="{{ asset('assets/template/img/home_3/instructure_shape_4.png') }}" alt="">
            </div>

            <div class="td_height_112 td_height_lg_75"></div>
            <div class="container">
                <div class="row td_gap_y_40">

                    {{-- Columna izquierda con imagen --}}
                    <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="td_image_box td_style_4">
                            <div class="td_image_box_img_1">
                                @isset($generalConfiguration->images['Test imagen'][0])
                                    <img
                                        src="{{ $generalConfiguration->images['Test imagen'][0]->mediaModel->getUrl() }}"
                                        alt="{{ $generalConfiguration->images['Test imagen'][0]->mediaModel->name }}"
                                        class="td_radius_10">
                                @else
                                    <img src="{{ asset('assets/template/img/home_3/instructor_img_1.png') }}" alt=""
                                         class="td_radius_10">
                                @endisset
                            </div>
                            {{-- Shapes decorativos de la imagen --}}
                            <div class="td_image_box_shape_1 td_accent_color">
                                <svg width="540" height="314" viewBox="0 0 540 314" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.642023 204.034C0.642023 199.857 3.23902 196.119 7.15436 194.662L525.953 1.59735C532.515 -0.844766 539.491 4.03967 539.44 11.0415L537.989 212.199C537.954 217.026 534.477 221.139 529.723 221.976L12.376 313.066C6.25379 314.144 0.642023 309.434 0.642023 303.218L0.642023 204.034Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <div class="td_image_box_shape_2">
                                <img src="{{ asset('assets/template/img/home_3/img_box_shape_2.svg') }}" alt="">
                            </div>
                            <div class="td_image_box_shape_3 td_accent_color">
                                <svg width="584" height="396" viewBox="0 0 584 396" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <!-- SVG decorativo -->
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Columna derecha con texto y botón --}}
                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="td_section_heading td_style_1">
                            <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
                                Podemos começar?
                            </p>
                            <h2 class="td_section_title td_fs_48 td_mb_20">
                                ¿Quieres conocer tu nivel de portugués?
                            </h2>
                            <p class="td_section_subtitle td_fs_18 td_mb_36">
                                El objetivo de este test es poder orientarte en tu nivel de portugués de cara a tu
                                inscripción en alguno de nuestros cursos de portugués.
                            </p>

                            <div class="td_mb_40 td_list_3_wrap">
                                <ul class="td_list td_style_3 td_mp_0">
                                    <li>
                                        <a href="{{ url('/pagina/test-de-nivel-de-portugues-gratis') }}"
                                           class="td_btn td_style_1 td_radius_30 td_medium">
                                    <span class="td_btn_in td_white_color td_accent_bg">
                                        <span>Hacer Test</span>
                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor"
                                                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="td_height_120 td_height_lg_80"></div>
        </section>
        {{-- End Test Banner Section --}}

    @endif

    {{-- Mostramos el test solo si la página es la #4 --}}
    @if($model->id == 4 )

        <section>
            <div class="td_testimonial_with_shape_wrap">
                <div class="td_testimonial_with_shape td_hobble"
                     style="background-image: url('{{ asset('assets/template/img/home_4/testimonial_bg.png') }}');">

                    <!-- Shapes decorativos -->
                    <div class="td_testimonial_shape_1 td_accent_color position-absolute td_hover_layer_3">
                        <svg width="46" height="240" viewBox="0 0 46 240" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M44.61 1.48954C43.4975 0.625824 41.8935 0.827182 41.0441 1.95066C15.4219 35.8376 1.2421 77.0249 0.598928 119.547C-0.0442428 162.07 12.8834 203.667 37.469 238.314C38.2841 239.462 39.8812 239.712 41.0193 238.882C42.1575 238.053 42.4057 236.458 41.591 235.309C17.6568 201.557 5.0724 161.041 5.69884 119.625C6.32528 78.2082 20.1293 38.0916 45.0733 5.07867C45.9224 3.95492 45.7226 2.35325 44.61 1.48954Z" fill="currentColor"/>
                        </svg>
                    </div>

                    <div class="td_height_120 td_height_lg_80"></div>

                    <!-- Contenedor del formulario -->
                    <div class="container">

                                    <!-- Iframe del test -->
                                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSf5Bn_LcK-gtXJsUaCNsA5iVdUDiKfLf5vpYehIVvdCLVlxXA/viewform?embedded=true"
                                            frameborder="0"
                                            style="width: 100%; min-height: 500px; display: block;">
                                    </iframe>


                    </div>
                    <br>
                </div>
            </div>
        </section>

        <div class="header-spacer"></div>


    @endif

    <!-- End Page Content -->


    @isset($model->images['Galería'][0])
        <!-- Start Gallery Section -->
        <div class="container">
            <div class="td_height_112 td_height_lg_75"></div>
            <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s"
                 data-wow-delay="0.2s">
                <p class="td_section_subtitle_up td_fs_18 td_semibold td_spacing_1 td_mb_10 text-uppercase td_accent_color">
                    {{ __("Gallery") }}
                </p>
                <h2 class="td_section_title td_fs_48 mb-0">{{ $model->title }}</h2>
            </div>
            <div class="td_height_50 td_height_lg_50"></div>
        </div>

        <ul class="td_instagram_list td_style_1 td_mp_0 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
            @foreach ($model->images['Galería'] as $image)
                <li>
                    <a href="{{ $image->mediaModel->getUrl() }}" data-fancybox="gallery">
                        <img src="{{ $image->mediaModel->getUrl('gallery') }}" alt="{{ $model->title }}">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="td_height_30 td_height_lg_30"></div>
        <!-- End Gallery Section -->
    @endisset


    {{--Carousel de testimonios--}}
    <x-testimonial-items/>

@endsection
