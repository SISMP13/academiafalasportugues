@extends('layout.app')

@section('metaFields')
    @livewire('meta-fields', [
    'metaTitle' => 'Blog',
    'ogUrl' => 'blog'
    ])
@endsection


@push('styles')
    <style>
        .header-spacer {
            height: 150px;
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


        .td_post.td_style_1 .td_post_info {
            border: 1px solid #ededed;
            border-top-width: 0;
            padding: 19px 30px 50px;
            border-radius: 0 0 10px 10px;
            width: 100%;
            height: 371px;
        }

        .td_post_thumb img {
            width: 100%;
            height: 340px; /* puedes ajustar el alto según tu diseño */
            object-fit: cover; /* recorta y centra la imagen */
            border-radius: 10px; /* opcional, si quieres bordes redondeados */
        }

    </style>

@endpush


@section('content')
    <!-- Start Page Heading Section -->
    @isset($generalConfiguration->images['Portada página blog'][0])
        <section class="td_page_heading td_center td_bg_filed td_heading_bg text-center td_hobble"
                 style="background-image: url('{{ $generalConfiguration->images['Portada página blog'][0]->mediaModel->getUrl() }}')">
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
    @else
        <section class="td_page_heading td_center text-center td_hobble">
            <div class="container">
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

    <!-- Start Blog List -->
    <section>
        <div class="td_height_120 td_height_lg_80"></div>
        <div class="container">

                <div class="row td_gap_y_30">
                    @forelse($posts as $post)
                    <div class="col-lg-4">
                        <div class="td_post td_style_1">
                            <a href="{{ route('posts.details', $post->slug) }}" class="td_post_thumb d-block">
                                @isset($post->images['Imagen social'][0])
                                    <img src="{{ $post->images['Imagen social'][0]->mediaModel->getUrl('thumb-post') }}"
                                         alt="{{ $post->title }}">
                                @else
                                    <img src="{{ asset('assets/img/home_1/default.jpg') }}" alt="{{ $post->title }}">
                                @endisset
                                <i class="fa-solid fa-link"></i>
                            </a>
                            <div class="td_post_info">
                                <div class="td_post_meta td_fs_14 td_medium td_mb_20">
                                    <span>
                                        <img src="{{ asset('assets/img/icons/calendar.svg') }}" alt="">
                                       {{ $post->created_at->translatedFormat('d M Y') }}

                                    </span>
                                    <span>
                                        <img src="{{ asset('assets/img/icons/user.svg') }}" alt="">
                                        {{ $post->author->name ?? 'Falas Portuges' }}
                                    </span>
                                </div>
                                <h2 class="td_post_title td_fs_24 td_medium td_mb_16">
                                    <a href="{{ route('posts.details', $post->slug) }}">{{ $post->title }}</a>
                                </h2>
                                <p class="td_post_subtitle td_mb_24 td_heading_color td_opacity_7">
                                    {!! Str::words(strip_tags($post->long_text), 20, '...') !!}
                                </p>
                                <a href="{{ route('posts.details', $post->slug) }}"
                                   class="td_btn td_style_1 td_type_3 td_radius_30 td_medium">
                                    <span class="td_btn_in td_accent_color">
                                        <span>{{ __('Read More') }}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                </div>

                <div class="text-center mt-5">
                    {{ __('No blogs at the moment, please check back later.') }}
                </div>
            @endforelse

            <div class="td_height_60 td_height_lg_40"></div>
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="td_height_120 td_height_lg_80"></div>
    </section>
    <!-- End Blog List -->
@endsection
