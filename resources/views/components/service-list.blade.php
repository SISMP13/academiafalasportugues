@if($services->isNotEmpty())
    <section>
        <div class="td_height_120 td_height_lg_80"></div>
        <div class="container">
            <div class="td_slider td_style_1 td_slider_gap_24">
                <div class="td_section_heading td_style_1 td_type_1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="td_section_heading_left">
                        <p class="td_section_subtitle_up_2 td_fs_18 td_semibold td_spacing_1 td_mb-10 text-uppercase td_heading_color td_opacity_6">{{__("Services")}}</p>
                        <h2 class="td_section_title td_fs_48 mb-0">{{__("Discover Our Services")}}</h2>
                    </div>
                    <div class="td_section_heading_right">
                        <div class="td_slider_arrows td_style_1 td_type_1">
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

                <div class="td_height_50 td_height_lg_50"></div>

                <div class="td_slider_container wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-autoplay="0" data-loop="1" data-speed="800" data-center="0" data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="4">
                    <div class="td_slider_wrapper">
                        @foreach($services as $service)
                            <div class="td_slide">
                                <div class="td_team td_style_4">
                                    <a href="{{ route('services.public', $service->slug) }}" class="td_team_thumb d-block td_radius_10 td_mb_16 overflow-hidden">
                                        @isset($service->images['Imagen destacada'][0])
                                            <img src="{{ $service->images['Imagen destacada'][0]->mediaModel->getUrl() }}" alt="{{ $service->title }}" class="w-100">
                                        @endisset
                                    </a>
                                    <div class="td_team_info">
                                        <div class="td_team_info_in">
                                            <h3 class="td_team_member_title td_fs_20 td_semibold mb-0">
                                                <a href="{{ route('services.public', $service->slug) }}">{{ $service->title }}</a>
                                            </h3>
                                            @isset($service->subtitle)
                                                <p class="td_team_member_designation mb-0 td_fs_14 td_opacity_6 td_heading_color">{{ $service->subtitle }}</p>
                                            @endisset
                                        </div>
                                        @isset($service->socials)
                                            <div class="td_team_social_list td_fs_14 td_accent_color">
                                                @foreach($service->socials as $icon => $link)
                                                    <a href="{{ $link }}"><i class="fa-brands fa-{{ $icon }}"></i></a>
                                                @endforeach
                                            </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="td_height_120 td_height_lg_80"></div>
    </section>
@endif
