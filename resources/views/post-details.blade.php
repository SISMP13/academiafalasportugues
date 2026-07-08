@extends('layout.app')
@section('metaFields')
    @livewire('meta-fields',
    [
    'metaTitle' => $model->meta_title,
    'metaDescription' => $model->meta_description,
    'metaKeywords' => $model->meta_keywords,
    'blog/'.$model->slug,
    'socialImage' => $model->images["Imagen destacada"][0] ?? null
    ]
    )
@endsection


@push('styles')

@endpush

@section('content')
    <!-- Start Page Heading Section -->

    @isset($model->images['Imagen destacada'][0])
        <section class="td_page_heading td_center td_bg_filed td_heading_bg text-center td_hobble bg-cover"
                 style="background-image: url('{{ $model->images['Imagen social'][0]->mediaModel->getUrl() }}'); position: relative;">
            <div class="overlay"></div>
            <div class="container position-relative">
                <div class="td_page_heading_in">
                    <h1 class="td_white_color td_fs_48 td_mb_10">{{ __('Blog') }}</h1>
                    <ol class="breadcrumb m-0 td_fs_20 td_opacity_8 td_semibold td_white_color">
                        <li class="breadcrumb-item"><a href="{{ config('app.url') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active"><a href="/blog">{{ __('Blog') }}</a></li>
                    </ol>
                </div>
            </div>
        </section>

    @else
        <section class="td_page_heading td_center text-center td_hobble">
            <div class="overlay"></div>
            <div class="container position-relative">
                <div class="td_page_heading_in">
                    <h1 class="td_white_color td_fs_48 td_mb_10">Blog</h1>
                    <ol class="breadcrumb m-0 td_fs_20 td_opacity_8 td_semibold td_white_color">
                        <li class="breadcrumb-item"><a href="{{ config('app.url') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </div>
            </div>
        </section>
    @endisset
    <!-- End Page Heading Section -->

    <section>
        <div class="td_height_120 td_height_lg_80"></div>
        <div class="td_about td_style_1">
            <div class="container">
                <div class="row align-items-center td_gap_y_40">

                    {{-- Columna de imagen --}}
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.25s">
                        <div class="td_about_thumb_wrap">
                            <div class="td_about_year text-uppercase td_fs_64 td_bold"> {{ $model->title_2 }}</div>

                            {{-- Primera imagen --}}
                            <div class="td_about_thumb_1">
                                @if(isset($model->images['Imagen destacada'][0]))
                                    <img src="{{ $model->images['Imagen destacada'][0]->mediaModel->getUrl() }}"
                                         alt="{{ $model->images['Imagen destacada'][0]->mediaModel->name }}">
                                @else
                                    <img src="{{ asset('assets/image/web/1.jpeg') }}" alt="{{ $model->title }}">
                                @endif
                            </div>

                            {{-- Segunda imagen --}}
                            <div class="td_about_thumb_2">
                                @if(isset($model->images['Imagen destacada'][1]))
                                    <img src="{{ $model->images['Imagen destacada'][1]->mediaModel->getUrl() }}"
                                         alt="{{ $model->images['Imagen destacada'][1]->mediaModel->name }}">
                                @else
                                    <img src="{{ asset('assets/image/web/2.jpeg') }}" alt="{{ $model->title }}">
                                @endif
                            </div>

                            {{-- Elementos decorativos --}}

                            @php
                                $videoUrl = str_replace("watch?v=", "embed/", $model->title_3);
                            @endphp

                            <a href="{{ $videoUrl }}" class="td_circle_text td_center td_video_open">
                                <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.086 8.63792C14.6603 9.03557 14.6603 9.88459 14.086 10.2822L2.54766 18.2711C1.88444 18.7303 0.978418 18.2557 0.978418 17.449L0.978418 1.47118C0.978418 0.664496 1.88444 0.189811 2.54767 0.649016L14.086 8.63792Z" fill="white"/>
                                </svg>
                                <img src="{{ asset('assets/img/home_1/about_circle_text.svg') }}" alt="">
                            </a>

                            <div class="td_circle_shape"></div>
                        </div>
                    </div>



                    {{-- Columna de texto --}}
                    <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="td_section_heading td_style_1 td_mb_30">
                            <h2 class="td_section_title td_fs_48 mb-0">{{ $model->title }}</h2>
                            <div class="td_section_subtitle td_fs_18 mb-0">
                                {!! $model->short_text !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="td_height_112 td_height_lg_75"></div>
        <div class="container" style=" max-width: 1300px;">
            <div class="td_section_heading td_style_1  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="td_section_subtitle td_fs_18 mb-0">{!! $model->long_text !!}</div>
                  </div>
        </div>
        <div class="td_height_120 td_height_lg_80"></div>
    </section>


    {{--Para usar todas las integraciones (donde :model es el elemento donde se han asociado las integraciones)--}}
    <x-media-integrations::components.public.all-media-integrations :model="$model"/>
    @isset($model->images['Galería'][0])
        <hr class="hr_50">
        <div class="section bg-transparent position-relative border-0 z-index-1 m-0 p-0">
            <div class="container-custom py-4">
                <h2 class="title__custom mb-5">{{__("Image gallery")}}</h2>
                <div class="row justify-content-center gallery-pages">
                    @foreach ($model->images['Galería'] as $image)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-md-5 mb-3">
                            <div class="text-center zoom-gallery">
                                <a href="{{ $image->mediaModel->getUrl() }}" data-fancybox="gallery">
                                    <img src="{{ $image->mediaModel->getUrl('gallery') }}" class="img-fluid" alt="{{$image->mediaModel->name}}">
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endisset
@endsection
