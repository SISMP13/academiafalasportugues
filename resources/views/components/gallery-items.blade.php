@isset($model->images['Galería'][0])
    <!-- Start Gallery Section -->
    <div class="container">
        <div class="td_height_112 td_height_lg_75"></div>
        <div class="td_section_heading td_style_1 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
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
