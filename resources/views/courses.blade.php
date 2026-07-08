@extends('layout.app')

@section('metaFields')
    @livewire('meta-fields',
    [
    'metaTitle' => 'Cursos',
    'ogUrl' => 'cursos'
    ]
    )
@endsection

@section('content')

    @isset($generalConfiguration->images['Imagen cursos'][0])
        <section class="td_page_heading td_center td_bg_filed td_heading_bg text-center td_hobble"
                 style="position:relative; background-image: url('{{ $generalConfiguration->images['Imagen cursos'][0]->mediaModel->getUrl() }}');">
            @else
                <section class="td_page_heading td_center td_bg_filed td_heading_bg text-center td_hobble"
                         style="position:relative; background-image: url('{{ asset('assets/image/web/2.jpeg') }}');">
                    @endisset

                    <div class="container" style="position:relative; z-index:1;">
                        <div class="td_page_heading_in">
                            <h1 class="td_white_color td_fs_48 td_mb_10">{{ __('Cursos disponibles') }}</h1>
                            <ol class="breadcrumb m-0 td_fs_20 td_opacity_8 td_semibold td_white_color">
                                <li class="breadcrumb-item"><a href="/">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Cursos disponibles') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="td_page_heading_shape_1 position-absolute td_hover_layer_3"></div>
                    <div class="td_page_heading_shape_2 position-absolute td_hover_layer_5"></div>
                    <div class="td_page_heading_shape_3 position-absolute">
                        <img src="{{ asset('assets/template/img/others/page_heading_shape_3.svg') }}" alt="">
                    </div>
                    <div class="td_page_heading_shape_4 position-absolute">
                        <img src="{{ asset('assets/template/img/others/page_heading_shape_4.svg') }}" alt="">
                    </div>
                    <div class="td_page_heading_shape_6 position-absolute td_hover_layer_3"></div>
                </section>


                @if($courses->count())
                    <section>
                        <div class="td_height_120 td_height_lg_80"></div>
                        <div class="container">
                            <div class="row td_gap_y_30">
                                @foreach($courses as $course)
                                    <div class="col-lg-6">
                                        <div class="td_card td_style_1 td_radius_5">
                                            {{-- Imagen destacada --}}
                                            <a href="{{ route('course.details', $course->slug) }}" class="td_card_thumb td_mb_30 d-block">
                                                @isset($course->images['Imagen destacada'][0])
                                                    <img src="{{ $course->images['Imagen destacada'][0]->mediaModel->getUrl() }}"
                                                         alt="{{ $course->title }}"
                                                         class="td_radius_10 w-100 fixed-img">
                                                @else
                                                    <img src="{{ asset('assets/template/img/others/team_details.png') }}"
                                                         alt="{{ $course->title }}"
                                                         class="td_radius_10 w-100 fixed-img">
                                                @endisset
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>


                                            <div class="td_card_info">
                                                <div class="td_card_info_in">
                                                    {{-- Título --}}
                                                    <h2 class="td_card_title td_fs_32 td_semibold td_mb_20">
                                                        <a href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                                    </h2>

                                                    {{-- Descripción corta --}}
                                                    <p class="td_mb_30 td_fs_18">
                                                        {!! Str::limit(strip_tags($course->text_info ?? $course->text), 200) !!}

                                                    </p>
                                                    {{-- Botones --}}
                                                    <div class="d-flex flex-wrap gap-2">
                                                        {{-- Botón "Ver más" --}}
                                                        <a href="{{ route('course.details', $course->slug) }}"
                                                           class="td_btn td_style_1 td_radius_10 td_medium">
                                                            <span class="td_btn_in td_white_color td_accent_bg">
                                                                <span>{{ __('See more') }}</span>
                                                                <svg width="19" height="20" viewBox="0 0 19 20"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.1575 4.34302L3.84375 15.6567"
                                                                          stroke="currentColor" stroke-width="1.5"
                                                                          stroke-linecap="round"
                                                                          stroke-linejoin="round"></path>
                                                                    <path
                                                                        d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </svg>
                                                            </span>
                                                        </a>

                                                        {{-- Botón "Inscribirme" o "Inscripción cerrada" --}}
                                                        @if($course->inscription)
                                                            <a href="{{ route('course.details', $course->slug) }}#form"
                                                               class="td_btn td_style_1 td_radius_10 td_medium">
                                                                    <span class="td_btn_in td_white_color bg-success">
                                                                        <span>{{ __('Inscribirme') }}</span>
                                                                    </span>
                                                            </a>
                                                        @else
                                                            {{-- Botón desactivado --}}
                                                            <button type="button"
                                                                    class="td_btn td_style_1 td_radius_10 td_medium td_disabled"
                                                                    disabled>
                                                            <span class="td_btn_in td_white_color td_gray_bg_2">
                                                                <span>{{ __('Inscripción cerrada') }}</span>
                                                                <i class="fa-solid fa-lock ms-2"></i>
                                                            </span>
                                                            </button>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Paginación o botón de cargar más --}}
                            <div class="td_height_60 td_height_lg_40"></div>
                            <div class="text-center">
                                {{-- {{ $courses->links() }}--}}
                            </div>
                        </div>
                        <div class="td_height_120 td_height_lg_80"></div>
                    </section>
                @else
                    <p class="text-center">{{ __('No hay cursos disponibles en este momento.') }}</p>
                @endif




                @endsection

 @push('styles')
                    <style>
                        @media (max-width: 991px) {
                            .td_fs_48 {
                                font-size: 28px;
                            }
                            .td_page_heading {
                                padding: 56px 0 60px;
                            }
                            .td_fs_20 {
                                font-size: 14px;
                            }
                            .header-spacer{
                                height: 1px !important;
                            }
                        }


                        /* Botón deshabilitado */
                        .td_btn.td_disabled {
                            cursor: not-allowed;
                            opacity: 0.7;
                            transition: all 0.3s ease;
                        }

                        .td_btn.td_disabled .td_btn_in {
                            background-color: #6b747c !important; /* Gris suave */
                            color: #fff !important;
                        }

                        .td_btn.td_disabled:hover .td_btn_in {
                            background-color: #6b747c !important;
                            transform: none !important;
                        }

                        .td_btn.td_disabled i {
                            font-size: 0.9rem;
                            opacity: 0.9;
                        }


                        .header-spacer {
                            height: 0;
                        }

                        .td_page_heading {
                            min-height: 610px;
                        }

                        .td_page_heading::before {
                            content: "";
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0, 0, 0, 0.5); /* negro 50% */
                            z-index: 0; /* capa por detrás */
                        }

                        .td_opacity_8 {
                            opacity: 1;
                        }

                        .fixed-img {
                            width: 100%;
                            height: 320px;
                            object-fit: cover;
                            border-radius: 10px;
                            display: block;
                        }

                    </style>
        @endpush
