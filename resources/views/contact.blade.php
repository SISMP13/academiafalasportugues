@extends('layout.app')
@section('metaFields')
    @livewire('meta-fields',
    [
    'metaTitle' => $model->meta_title,
    'metaDescription' => $model->meta_description,
    'metaKeywords' => $model->meta_keywords,
    '/contacto'
    ]
    )
@endsection

@section('content')
    @isset($model->images["Imagen portada"][0])
        <div class="breadcrumb-wrapper" style="background-image: url({{ $model->images["Imagen portada"][0]->mediaModel->getUrl() }})">
            <div class="container">
                <div class="row breadcrumb__section">
                    <div class="col-md-12">
                        <div class="text text-center">
                            <div class="heading">
                                <h1 class="text-white">{{ $model->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset
    <div class="regular-page">
        <div class="container-custom2 my-5">
            @isset($model->images["Imagen portada"][0]) @else
                <h1 class="title__h1">{{ $model->title }}</h1>
            @endisset
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="pages-text">
                        {!! $model->text !!}
                    </div>
                </div>
                <div class="col-lg-6 section2-pages--block1-text">
                    @isset($response)
                        @if($response['status'] == 'success')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ __('contact::public.message_success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if($response['status'] == 'error')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ __('contact::public.message_error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    @endisset

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                {{$error}}<br>
                            @endforeach
                        </div>
                    @endif

                    <!-- Adaptación al estilo de la plantilla -->
                    <div class="td_form_card td_style_1 td_radius_10 td_gray_bg_5">
                        <div class="td_form_card_in">

                            <form action="{{route('contact.store')}}" method="post" class="form-validate">
                                @csrf

                                <!-- Nombre -->
                                <label class="td_medium td_heading_color td_mb_12">{{ __("Name") }} *</label>
                                <input type="text" name="name" id="name" class="td_form_field td_mb_30 td_medium td_white_bg @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror

                                <!-- Teléfono -->
                                <label class="td_medium td_heading_color td_mb_12">{{ __("Phone") }}</label>
                                <input type="text" name="phone" id="phone" class="td_form_field td_mb_30 td_medium td_white_bg @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror

                                <!-- Email -->
                                <label class="td_medium td_heading_color td_mb_12">{{ __("Email") }} *</label>
                                <input type="email" name="email" id="email" class="td_form_field td_mb_30 td_medium td_white_bg @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror

                                <!-- Mensaje -->
                                <label class="td_medium td_heading_color td_mb_12">{{ __("Message") }} *</label>
                                <textarea name="message" id="message" rows="6" class="td_form_field td_mb_30 td_medium td_white_bg @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror

                                <!-- Checkbox de políticas -->
                                <div class="mb-4 form-check form-switch">
                                    <input class="form-check-input @error('policies') is-invalid @enderror" type="checkbox" role="switch" name="policies" id="policies" required>
                                    <label class="form-check-label" for="policies">
                                        <span class="text-danger">*</span> {{ __('I have read and accept the following legal policies') }}
                                    </label>
                                    <div>
                                        <a class="link-secondary-custom form-check-label" href="{{route('legal-text.public',$lopd->slug)}}" target="_blank">{{ __('Privacy policy') }}</a>&nbsp;
                                        <a href="#" class="link-secondary-custom form-check-label" data-fancybox data-src="#data_protect">{{ __("Basic information about data protection") }}</a>
                                    </div>
                                    @error('policies') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Captcha -->
                                <div class="my-3 text-center">
                                    <div class="captcha d-flex justify-content-center align-items-center">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="button-recaptcha bg-danger border-0 reload ms-3" id="reload">&#x21bb;</button>
                                    </div>
                                    <div class="form-block mt-3">
                                        <input type="text" name="captcha" id="captcha" class="td_form_field td_medium td_white_bg @error('captcha') is-invalid @enderror" placeholder="{{ __("enter the code from the image") }}" required>
                                        @error('captcha') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <small class="d-block mb-3">(<span class="text-danger">*</span>) {{ __('Required fields') }}</small>

                                <!-- Botón -->
                                <button type="submit" class="td_btn td_style_1 td_radius_10 td_medium w-100 td_fs_20">
                    <span class="td_btn_in td_white_color td_accent_bg">
                        <span>{{ __("Submit") }}</span>
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-lg-0 mt-3">
                    <div id="mapCanvas" class="ratio ratio-1x1 border animate fadeInDownShorter delay-1s medium" style="height: 600px"></div>
                    <div class="td_mb_30 mt-5 mb-5" >
                        <ul class="td_team_member_contact_list td_mp_0 td_fs_18 td_semibold td_heading_color">
                            <!-- Teléfono -->
                            @if(!empty($generalConfiguration->business_mobile))
                                <li>
                                    <i class="td_team_member_contact_icon td_center td_accent_color">
                                        <!-- Aquí puedes poner tu SVG de teléfono -->
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.1558 11.3568C14.7628 10.966 14.2889 10.7571 13.7865 10.7571C13.2882 10.7571 12.8102 10.9622 12.401 11.353L11.1209 12.5718C11.0155 12.5177 10.9102 12.4674 10.8089 12.4171C10.6631 12.3474 10.5253 12.2816 10.4079 12.212C9.20872 11.4845 8.11896 10.5365 7.07376 9.30995C6.56737 8.69858 6.22707 8.18396 5.97995 7.66159C6.31215 7.37139 6.62004 7.06958 6.91982 6.77937C7.03325 6.67103 7.14668 6.55882 7.26012 6.45048C8.11086 5.63791 8.11086 4.58544 7.26012 3.77287L6.15415 2.71653C6.02857 2.59658 5.89893 2.47276 5.7774 2.34894C5.53433 2.10904 5.27911 1.8614 5.01578 1.62923C4.62282 1.25777 4.15289 1.06043 3.65865 1.06043C3.16441 1.06043 2.68637 1.25777 2.28126 1.62923C2.27721 1.6331 2.27721 1.6331 2.27316 1.63697L0.895768 2.96417C0.377222 3.45945 0.0814882 4.06307 0.0166699 4.76343C-0.0805576 5.89329 0.267841 6.94576 0.535216 7.6345C1.1915 9.32542 2.17188 10.8925 3.63434 12.5718C5.40874 14.5955 7.5437 16.1936 9.98248 17.3196C10.9142 17.7413 12.158 18.2405 13.5475 18.3256C13.6326 18.3295 13.7217 18.3333 13.8027 18.3333C14.7385 18.3333 15.5245 18.0122 16.1402 17.3737C16.1443 17.366 16.1524 17.3621 16.1564 17.3544C16.3671 17.1106 16.6102 16.8901 16.8654 16.654C17.0396 16.4954 17.2178 16.329 17.392 16.1549C17.7931 15.7563 18.0038 15.292 18.0038 14.8161C18.0038 14.3363 17.789 13.8758 17.3799 13.4889L15.1558 11.3568ZM16.6061 15.4313C16.6021 15.4313 16.6021 15.4352 16.6061 15.4313C16.4481 15.5938 16.2861 15.7409 16.1119 15.9034C15.8485 16.1433 15.5812 16.3948 15.33 16.6772C14.9208 17.0951 14.4387 17.2925 13.8068 17.2925C13.746 17.2925 13.6812 17.2925 13.6204 17.2886C12.4172 17.2151 11.2991 16.7662 10.4605 16.3832C8.16757 15.323 6.15415 13.8178 4.48103 11.9102C3.09959 10.3199 2.17593 8.84949 1.56421 7.27078C1.18745 6.30731 1.04971 5.55665 1.11048 4.84855C1.15099 4.39584 1.33329 4.02051 1.66954 3.69935L3.05098 2.37989C3.24948 2.2019 3.46014 2.10517 3.66675 2.10517C3.92197 2.10517 4.12858 2.2522 4.25822 2.37602C4.26227 2.37989 4.26632 2.38376 4.27037 2.38763C4.51749 2.60819 4.75246 2.83648 4.99958 3.08025C5.12516 3.20407 5.2548 3.32789 5.38444 3.45558L6.4904 4.51192C6.91982 4.92207 6.91982 5.30127 6.4904 5.71143C6.37292 5.82364 6.25948 5.93585 6.142 6.04419C5.8017 6.37696 5.47761 6.68651 5.12516 6.98832C5.11706 6.99606 5.10896 6.99993 5.10491 7.00767C4.75651 7.34043 4.82133 7.66546 4.89425 7.88601C4.8983 7.89762 4.90235 7.90923 4.9064 7.92084C5.19403 8.58637 5.59915 9.21321 6.21492 9.96L6.21897 9.96387C7.33709 11.2795 8.51597 12.3048 9.81639 13.0903C9.98249 13.1909 10.1526 13.2722 10.3147 13.3496C10.4605 13.4192 10.5983 13.485 10.7157 13.5547C10.7319 13.5624 10.7482 13.574 10.7644 13.5817C10.9021 13.6475 11.0317 13.6785 11.1654 13.6785C11.5017 13.6785 11.7123 13.4773 11.7812 13.4115L13.1667 12.0882C13.3044 11.9566 13.5232 11.798 13.7784 11.798C14.0296 11.798 14.2362 11.9489 14.3618 12.0804C14.3658 12.0843 14.3658 12.0843 14.3699 12.0882L16.6021 14.2202C17.0193 14.6149 17.0193 15.0211 16.6061 15.4313Z"
                                                fill="currentColor"/>
                                            <path
                                                d="M10.3592 4.36101C11.4206 4.53127 12.3848 5.01107 13.1545 5.74625C13.9242 6.48143 14.4225 7.40234 14.6048 8.41612C14.6494 8.6715 14.8803 8.84949 15.1436 8.84949C15.1761 8.84949 15.2044 8.84562 15.2368 8.84175C15.5366 8.79532 15.7351 8.52446 15.6865 8.23813C15.4677 7.01154 14.8601 5.89329 13.9324 5.0072C13.0046 4.12111 11.8339 3.5407 10.5496 3.33176C10.2499 3.28533 9.97033 3.47493 9.91767 3.75739C9.865 4.03985 10.0595 4.31458 10.3592 4.36101Z"
                                                fill="currentColor"/>
                                            <path
                                                d="M19.1583 8.08722C18.7978 6.06741 17.8012 4.22945 16.2699 2.76683C14.7385 1.3042 12.8142 0.352338 10.6995 0.00796375C10.4038 -0.0423381 10.1243 0.151131 10.0716 0.433595C10.023 0.719929 10.2215 0.986916 10.5213 1.03722C12.4091 1.3429 14.1309 2.19803 15.5001 3.50201C16.8694 4.80986 17.7607 6.45435 18.0807 8.25748C18.1253 8.51285 18.3562 8.69085 18.6195 8.69085C18.6519 8.69085 18.6803 8.68698 18.7127 8.68311C19.0084 8.64054 19.211 8.36969 19.1583 8.08722Z"
                                                fill="currentColor"/>
                                        </svg>
                                    </i>
                                    <a href="tel:+34{{ str_replace(' ', '', $generalConfiguration->business_mobile) }}">
                                        {{ $generalConfiguration->business_mobile }}
                                    </a>
                                </li>
                            @endif

                            <!-- Email -->
                            @if(!empty($generalConfiguration->business_email))
                                <li>
                                    <i class="td_team_member_contact_icon td_center td_accent_color">
                                        <!-- SVG de email -->
                                        <svg width="20" height="15" viewBox="0 0 20 15" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.1819 0.5H1.81817C0.814025 0.5 0 1.29282 0 2.27085V12.8959C0 13.8738 0.814025 14.6667 1.81817 14.6667H18.1818C19.186 14.6667 20 13.8738 20 12.8959V2.27085C20 1.29282 19.186 0.5 18.1819 0.5ZM1.81817 1.38543H18.1818C18.2857 1.38607 18.3887 1.40403 18.4864 1.43854L10.6182 9.10183C10.2803 9.43313 9.73057 9.43488 9.39041 9.10575C9.38908 9.10446 9.38771 9.10312 9.38639 9.10183L1.51364 1.43854C1.61129 1.40403 1.7143 1.38603 1.81817 1.38543ZM0.909103 12.8958V2.27085C0.904455 2.2193 0.904455 2.16745 0.909103 2.11589L6.53638 7.58333L0.909103 13.0508C0.904455 12.9992 0.904455 12.9474 0.909103 12.8958ZM18.1819 13.7812H1.81817C1.7143 13.7806 1.61129 13.7626 1.51364 13.7281L7.18181 8.20758L8.74092 9.72608C9.43369 10.4034 10.559 10.4054 11.2544 9.73068C11.256 9.72916 11.2575 9.7276 11.2591 9.72608L12.8182 8.20758L18.4864 13.7281C18.3887 13.7626 18.2857 13.7806 18.1819 13.7812ZM19.0909 13.0508L13.4637 7.58333L19.0909 2.11589C19.0956 2.16745 19.0956 2.2193 19.0909 2.27085V12.8959C19.0956 12.9474 19.0956 12.9992 19.0909 13.0508Z"
                                                fill="currentColor"/>
                                        </svg>
                                    </i>
                                    <a href="mailto:{{ $generalConfiguration->business_email }}">
                                        {{ $generalConfiguration->business_email }}
                                    </a>
                                </li>
                            @endif

                            <!-- Dirección -->
                            @if(!empty($generalConfiguration->business_address))
                                <li>
                                    <i class="td_team_member_contact_icon td_center td_accent_color">
                                        <!-- SVG de ubicación -->
                                        <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.66602 0.835938C6.5443 0.835938 4.50947 1.67879 3.00919 3.17908C1.50891 4.67937 0.666059 6.71419 0.666059 8.83592C0.659475 10.8268 1.40197 12.7473 2.74605 14.2159L8.28602 20.6609C8.33296 20.7158 8.39123 20.7599 8.45683 20.7901C8.52243 20.8203 8.59379 20.8359 8.66602 20.8359C8.73824 20.8359 8.8096 20.8203 8.8752 20.7901C8.9408 20.7599 8.99907 20.7158 9.04601 20.6609L14.586 14.2159C15.9301 12.7473 16.6726 10.8268 16.666 8.83592C16.666 6.71419 15.8231 4.67937 14.3228 3.17908C12.8226 1.67879 10.7877 0.835938 8.66602 0.835938ZM13.826 13.5659L8.66602 19.5709L3.50604 13.5709C2.588 12.5694 1.98123 11.3225 1.75972 9.98206C1.53821 8.64166 1.71155 7.26576 2.25859 6.02218C2.80563 4.7786 3.70273 3.72108 4.84047 2.9786C5.97822 2.23612 7.30744 1.84078 8.66602 1.84078C10.0246 1.84078 11.3538 2.23612 12.4916 2.9786C13.6293 3.72108 14.5264 4.7786 15.0734 6.02218C15.6205 7.26576 15.7938 8.64166 15.5723 9.98206C15.3508 11.3225 14.744 12.5694 13.826 13.5709V13.5659Z"
                                                fill="currentColor"/>
                                            <path
                                                d="M8.66601 5.33593C7.97378 5.33593 7.2971 5.5412 6.72153 5.92578C6.14596 6.31037 5.69736 6.85699 5.43245 7.49653C5.16755 8.13607 5.09824 8.8398 5.23328 9.51874C5.36833 10.1977 5.70167 10.8213 6.19115 11.3108C6.68064 11.8003 7.30427 12.1336 7.9832 12.2687C8.66213 12.4037 9.36586 12.3344 10.0054 12.0695C10.6449 11.8046 11.1916 11.356 11.5761 10.7804C11.9607 10.2048 12.166 9.52816 12.166 8.83592C12.166 7.90767 11.7972 7.01743 11.1409 6.36105C10.4845 5.70468 9.59427 5.33593 8.66601 5.33593ZM8.66601 11.3359C8.17156 11.3359 7.68822 11.1893 7.2771 10.9146C6.86598 10.6399 6.54555 10.2494 6.35633 9.79263C6.16711 9.33582 6.1176 8.83315 6.21406 8.3482C6.31053 7.86325 6.54863 7.41779 6.89826 7.06816C7.24789 6.71853 7.69334 6.48043 8.17829 6.38396C8.66324 6.2875 9.1659 6.33701 9.62272 6.52623C10.0795 6.71545 10.47 7.03588 10.7447 7.447C11.0194 7.85812 11.166 8.34147 11.166 8.83592C11.166 9.49896 10.9026 10.1348 10.4338 10.6037C9.96493 11.0725 9.32905 11.3359 8.66601 11.3359Z"
                                                fill="currentColor"/>
                                        </svg>
                                    </i>
                                    <span>{{ $generalConfiguration->business_address }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="td_footer_social_btns td_fs_20 td_mt_20">
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
    </div>
    {{--Carousel de testimonios--}}
    <x-testimonial-items />
    @include('partials.data-protect')
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/leaflet/leaflet.css') }}">

    <style>
        .form-check-label {
            font-size: 1.3rem;
            font-weight: 500;
        }
    </style>

@endpush
@push('scripts')
    <script src="{{ asset('assets/vendor/leaflet/leaflet.js') }}"></script>
    <script>
        const map = L.map("mapCanvas", {scrollWheelZoom: false}).setView([{{ $model->latitude }}, {{ $model->longitude }}], {{ $model->zoom }});
        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([{{ $model->latitude }}, {{ $model->longitude }}]).addTo(map);
    </script>
@endpush
