@extends('layout.app')
@section('metaFields')
    @livewire('meta-fields',
    [
    'metaTitle' => __('Portuguese language classes in Badajoz and online'),
    'metaDescription' => $generalConfiguration->meta_description,
    'metaKeywords' => $generalConfiguration->meta_keywords,


    'servicios/'.$model->slug,
    'socialImage' => isset($model->images['Imagen enlace'][0])
    ? $model->images['Imagen enlace'][0]
    : ($generalConfiguration->images['Imagen enlace'][0] ?? null)

    ]
    )
@endsection

@push('styles')

    <style>
		
		
        .td_btn.td_style_1.td_with_shadow::after {
            content: "";
            position: absolute;
            height: 100%;
            width: 100%;
            left: 2px;
            top: 4px;
            border-radius: inherit;
            /* background-color: var(--accent-color); */
            opacity: 0.3;
            -webkit-transition: all 0.3s
            ease;
            transition: all 0.3s
            ease;
        }

        hr {
            margin: 0;
            padding: 0;
            border: none;
            width: 300px;
            border-top: 2px solid #a8a530;
            opacity: 1;
        }
        /**/
        .td_fs_36 {
            font-size: 2rem;
            line-height: 1.4em;
        }

        /**/
        .margenb {
            padding: 0px 6rem;
        }
        .margena {
            padding: 0px 2rem;
        }
        /* ------------------------------
           ANIMACIONES Y TRANSICIONES
        ------------------------------ */
        .carousel-item {
            transition: transform 1.5s ease-in-out; /* scroll más suave */
        }

        .btn {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        /* ------------------------------
           HEADER
        ------------------------------ */
        .td_site_header.td_style_1.td_type_2 {
            box-shadow: 2px 2px 50px 0px rgba(255, 255, 255, 0);
            background-color: #fff;
        }


        /* ------------------------------
           HERO SLIDER
        ------------------------------ */


        /* Lado del texto */
        .hero-content {
            flex: 1;
            color: #000;
            padding: 60px;
            position: relative;

            z-index: 2;
        }

        /* Lado de la imagen */
        .hero-image {
            flex: 1;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        /* Imagen ajustada completamente */
        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* cubre todo el espacio derecho */
            object-position: center;
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 720px; /* ← Mantiene el alto original */
            position: relative;
            overflow: hidden;
            gap: 20px;
            padding: 60px;
            margin: 15px 0 15px 0;
            border-radius: 18px;
            max-height: 720px;
            /* Fondo principal del slider */
            background: linear-gradient(to right, #f8f7f5 0%, #f1efec 40%, #c3bab1 100%);
        }

        /* Degradado de transición entre el fondo y la imagen */
        .hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 40%; /* inicia donde termina el área del texto */
            width: 20%; /* zona de transición sobre la imagen */
            height: 100%;
            /* iguala el degradado del fondo, pero va difuminando hacia la transparencia */
            background: linear-gradient(
                to right,
                rgba(241, 239, 236, 1) 0%,      /* mismo color que el fondo medio */
                rgba(243, 241, 238, 0.85) 30%,  /* transición suave */
                rgba(243, 241, 238, 0.4) 60%,
                rgba(243, 241, 238, 0) 100%     /* totalmente transparente sobre la imagen */
            );
            z-index: 1;
            pointer-events: none;
        }


        /* Contenido de texto */
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 40%;
            padding: 2rem 3rem;
        }


        /* Imagen */
        .hero-image {
            flex: 1;
            position: absolute;
            top: 0;
            right: 0;
            width: 60%;
            height: 100%;
            overflow: hidden;
            border-radius: 0 18px 18px 0;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }



        /* Titulares y párrafos */
        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 40px;
            color: #393738;
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 50px;
            color: #393738;
        }

        /* Botones */
        .hero-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-green {
            background: #a4a22d;
            color: #000;
        }

        .btn-black {
            background: #000;
            color: #fff;
        }
        @media (max-width: 1200px) {

            #top-banner {
                z-index: -20;
                background: #f6f6f6;
            }
            .border__wrapper {
                display: flex;
                width: 100%;
                height: 7px;
                position: absolute;
                z-index: 9999;
                top: 0;
            }
        }


        @media (max-width: 992px) {
            .hero {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                text-align: center;
                padding: 40px 20px 0 20px;
                margin: 20px auto;
                height: auto;
                background: #f7f7f7;
                border-radius: 18px;
                overflow: hidden;
            }

            .hero-content {
                width: 100%;
                max-width: 500px;
                padding: 0 10px;
                margin-bottom: 20px;
            }

            .hero-content h1 {
                font-size: 1.9rem;
                line-height: 1.3;
                margin-bottom: 15px;
            }

            .hero-content p {
                font-size: 1rem;
                margin-bottom: 25px;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 12px;
                width: 100%;
            }

            .hero-buttons a {
                width: 100%;
                text-align: center;
            }

            .hero-image {
                position: relative;
                width: 100%;
                height: 280px;
                margin: 0;
                border-radius: 12px;
            }

            .hero-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                border-radius: 12px;
            }
        }


        /* Responsive */
        @media (max-width: 992px) {

            #top-banner {
                z-index: -20;
                background: #f6f6f6;
                }

           /* .hero {
                flex-direction: column;
                align-items: flex-start;
                padding: 30px 20px;
                height: 760px;
                max-height: 100%;
                background: #f7f7f7;
                margin: 40px 2px 10px 2px;
                border-radius: 18px;
            }


            .hero-content {
                width: 100%;                      !* ocupa todo el ancho *!
                max-width: 500px;
                padding: 20px;
                background: transparent;           !* quitar fondo sólido *!
                margin-bottom: 0;                  !* el texto y la imagen se superponen ligeramente *!
                z-index: 2;
                position: relative;
            }

            .hero-image {
                position: relative;
                height: 100%;
                overflow: hidden;
                margin-top: -35px;
                flex: 1;
                !* position: absolute; *!
                top: 39px;
                !* right: 0; *!
                width: 67vh;
                !* height: 100%; *!
                border-radius: 18px 18px;
            }

            .hero-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }

            !* Línea degradada hacia abajo, similar a escritorio *!
            .hero::before {
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 40px;  !* altura de la línea degradada *!
                background: linear-gradient(to bottom, rgba(248, 247, 245, 0) 0%, #f8f7f5 100%);
                z-index: 1;
                pointer-events: none;
            }

            !* Ajuste tipografía *!
            .hero h1 {
                font-size: 1.8rem;
                margin-bottom: 20px;
            }

            .hero p {
                font-size: 1rem;
                margin-bottom: 30px;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 12px;
                width: 100%;
            }

            .hero-buttons a {
                width: 100%;
                text-align: center;
            }*/
        }


        /* ------------------------------
           LISTADO DE SERVICIOS
        ------------------------------ */
        .service-img {
            height: 340px;
            object-fit: cover;
            object-position: center;
        }

        .td_team_thumb .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .td_team_thumb:hover .overlay {
            opacity: 1;
        }

        .td_team_thumb .overlay .btn {
            background-color: #b3ae39;
            color: #000;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .td_team_thumb .overlay .btn:hover {
            background-color: #afb42b;
        }

        /* ------------------------------
           CARDS EXTRA
        ------------------------------ */


        .cars {
            display: flex; /* usamos flex en vez de grid para controlar expansión */
            gap: 15px;
        }

        /* Card */
        .car {
            flex: 1; /* todas ocupan el mismo espacio al inicio */
            display: flex;
            flex-direction: row-reverse;
            overflow: hidden;
            border-radius: 18px;
            background: linear-gradient(to right, #f8f7f5 0%, #f1efec 40%, #d8d3cd 100%);
            transition: all 0.4s ease;
            min-width: 0; /* evita que se rompa */
        }

        /* Hover → la card crece, las demás se encogen */
        .car:hover {
            flex: 1.5; /* dobla su ancho */
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        /* Imagen */
        .car img {
            width: 53%;
            max-width: 340px;
            height: 288px;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease-in-out;
        }

        /* Texto */
        .car-text {
            padding: 41px 1px 10px 37px;
            flex: 1;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .car-text h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #393738;
        }

        /* Texto oculto */
        .car-text p {
            opacity: 0;
            max-width: 0;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        /* Texto visible al hover */
        .car:hover .car-text p {
            opacity: 1;
            max-width: 100%;
            margin-top: 10px;
        }


        /* ------------------------------
           RESPONSIVE
        ------------------------------ */
        @media (max-width: 768px) {
          /*  .hero {
                flex-direction: column;
                text-align: center;
                padding: 20px;
                gap: 20px;
                max-height: unset;
                background: #fff; !* fondo más limpio en mobile *!
                margin: -10px 0 15px 0;
            }

            .hero-content {
                max-width: 100%;
                margin: 30px 10px 0;
            }*/

            .hero h1 {
                font-size: 2rem;
                margin-bottom: 15px;
            }

            .hero p {
                font-size: 1rem;
                margin-bottom: 20px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
                gap: 12px;
            }

            .hero-image {
                margin-top: -43px;
            }

            .hero-image img {
                max-width: 100%;
                transform: scale(1.05) translateY(0);
            }

            .hero::before,
            .hero::after {
                display: none; /* quitamos círculos decorativos en móvil */
            }

            /* ---- Cards pequeñas en móvil ---- */
            .cars {
                display: flex;
                flex-direction: column;
                gap: 15px;
                margin-top: 30px;
            }

            .car {
                flex-direction: row-reverse;
                align-items: center;
                background: #f7f7f7;
                border-radius: 12px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            }

            .car img {
                max-width: 140px;
                height: auto;
                border-radius: 6px;
                flex-shrink: 0;
            }

            .car-text {
                flex: 1;
                text-align: left;
                margin: 10px;
            }
        }

        @media (max-width: 768px) {
            /* Contenedor del hero */
        /*    .hero {
                flex-direction: column;
                text-align: center;
                padding: 20px;
                gap: 20px;
                height: auto;
                background: #fff;
            }

            !* Botones en fila en mobile *!
            .hero-buttons {
                flex-direction: row;
                justify-content: center;
                gap: 12px;
            }

            !* Imagen sin superposición *!
            .hero-image {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: flex-end;
            }

            .hero-image img {
                width: 100%;
                max-width: 320px; !* evita que se estire demasiado *!
                height: auto;
                object-fit: contain; !* mantiene proporción sin recortar *!
                border-radius: 8px;
                transform: none; !* quitamos el translate que causaba el solapamiento *!
            }*/



            .margenb {
                padding: 0px 3rem;
            }

            .margena {
                padding: 0px 1rem 0 3rem;
            }
            .td_shape_section_9 h2 {
                text-align: center;
                font-size: 1.6rem;
                line-height: 1.2;
                margin-bottom: 6px;
            }

            .car-text h3 {
                font-size: 1.4rem;
                margin-bottom: 32px;
                color: #393738;
            }

        }


    </style>

    <style>
        @media screen and (max-width: 991px) {

            .td_shape_section_9 .row {
                flex-direction: column;
                text-align: center;
            }

            .td_shape_section_9 h2,
            .td_shape_section_9 p,
            .td_shape_section_9 ul {
                text-align: center;
            }

            .td_shape_section_9 ul {
                margin: 0 auto 20px;
                max-width: 500px;
            }

            .td_shape_section_9 ul li {
                text-align: left;
            }

            .td_shape_section_9 a.td_btn {
                background-color: #a4a22d;
                margin-top: 2rem;
                color: #000000;
                padding: 13px 32px;
                font-size: 0.8rem;
                font-weight: 600;
                text-decoration: none;
                display: inline-block;
                border-radius: 18px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                transition: background 0.3s
                ease;
            }
        }

        /* --- About Section Mejorada --- */
        .td_shape_section_9 .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        /* Imagen */
        .td_shape_section_9 .col-lg-6 img {
            max-width: 100%;
            border-radius: 12px;
            display: block;
        }


        /* Párrafo */
        .td_shape_section_9 p {
            text-align: justify;
            font-size: 1.1rem;
            line-height: 1.2;
            margin-bottom: 6px;
        }

        /* Lista con checkmarks */
        .td_shape_section_9 ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 30px;
        }

        .td_shape_section_9 ul li {
            font-size: 1.05rem;
            margin-bottom: 12px;
            padding-left: 40px; /* deja espacio para el check circular */
            position: relative;
        }

        .td_shape_section_9 ul li::before {
            content: "✔";
            position: absolute;
            left: 0px;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: transparent;
            color: #a4a22d;
            border: 2px solid #a4a22d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }



        /* Botón */
        .td_shape_section_9 a.td_btn {
            background-color: #a4a22d;
            margin-top: 2rem;
            color: #000000;
            padding: 13px 32px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            border-radius: 18px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease;
        }

        .td_shape_section_9 a.td_btn:hover {
            background-color: #8b8b00;
        }

    </style>

    <style>
        .car-text p {
            display: none;
        }

        .car:hover .car-text p {
            display: block;
        }

        .carousel-control-next, .carousel-control-prev {
            width: 4%;
        }

        /* Indicador circular (estado base: vacío blanco con borde gris) */
        .status-dot {
            display: inline-block;
            width: 14px;
            height: 14px;
            margin-right: 8px;
            border-radius: 50%;
            border: 1px solid #f3f2ef;
            background-color: #fff;
            vertical-align: middle;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        /* Cuando se hace hover en la card → el círculo se activa en verde */
        .car:hover .status-dot {
            background-color: #aaab4a; /* verde bootstrap */
            border-color: #9fa348;
        }


    </style>

@endpush

@section('content')

    <section class=" t_center" style="background: white;">
        <div class="container" style="max-width: 1700px; background: white;">
            <!-- Hero principal -->
            @if($slides->isNotEmpty())
                <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000">
                    <div class="carousel-inner">
                        @foreach($slides as $index => $slide)
                            <div class="carousel-item @if($index === 0) active @endif">
                                <div class="hero d-flex align-items-center">
                                    <div class="hero-content">
                                        <h1>{{ $slide->title }}</h1>
                                        <p>{{ $slide->text }}</p>
                                        <div class="hero-buttons">
                                            @if($slide->text_btn && $slide->url_btn)
                                                <a href="{{ $slide->url_btn }}" class="btn btn-green">{{ $slide->text_btn }}</a>
                                            @endif
                                            @if($slide->text_btn2 && $slide->url_btn2)
                                                <a href="{{ $slide->url_btn2 }}" class="btn btn-black">{{ $slide->text_btn2 }}</a>
                                            @endif
                                        </div>
                                    </div>
                                    @if($slide->image)
                                        <div class="hero-image">
                                            <img src="{{ $slide->image->mediaModel->getUrl() }}" alt="{{ strip_tags($slide->title) }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($slides->count() > 1)
                        <!-- Controles -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    @endif
                </div>
            @endif

           <!-- Cards -->
<div class="cars">

    {{-- Card 1 --}}
    <div class="car">
        @isset($model->images['Imagen bloque 2'][0])
            <img src="{{ $model->images['Imagen bloque 2'][0]->mediaModel->getUrl() }}"
                 alt="{{ $model->title4 }}">
        @else
            <img src="{{ asset('assets/image/web/img2.png') }}" alt="Empresas">
        @endisset

        <div class="car-text">
            <h3>
                <span class="status-dot"></span>
                {{ !empty($model->title4) ? $model->title4 : 'Empresas' }}
            </h3>

            <p>
                {{ !empty($model->text_bloque_3)
                    ? $model->text_bloque_3
                    : 'Aprende en grupo, en un entorno real y cercano.' }}
            </p>
        </div>
    </div>

    {{-- Card 2 --}}
    <div class="car">
        @isset($model->images['Imagen bloque 3'][0])
            <img src="{{ $model->images['Imagen bloque 3'][0]->mediaModel->getUrl() }}"
                 alt="{{ $model->title_bloque_2 }}">
        @else
            <img src="{{ asset('assets/image/web/img3.png') }}" alt="Cursos">
        @endisset

        <div class="car-text">
            <h3>
                <span class="status-dot"></span>
                {{ !empty($model->title_bloque_2) ? $model->title_bloque_2 : 'Cursos' }}
            </h3>

            <p>
                {{ !empty($model->text_bloque_4)
                    ? $model->text_bloque_4
                    : 'Formación práctica adaptada a todos los niveles.' }}
            </p>
        </div>
    </div>

    {{-- Card 3 --}}
    <div class="car">
        @isset($model->images['Imagen bloque 4'][0])
            <img src="{{ $model->images['Imagen bloque 4'][0]->mediaModel->getUrl() }}"
                 alt="{{ $model->title_bloque_3 }}">
        @else
            <img src="{{ asset('assets/image/web/img4.png') }}" alt="Particulares">
        @endisset

        <div class="car-text">
            <h3>
                <span class="status-dot"></span>
                {{ !empty($model->title_bloque_3) ? $model->title_bloque_3 : 'Particulares' }}
            </h3>

            <p>
                {{ !empty($model->title_bloque_4)
                    ? $model->title_bloque_4
                    : 'Clases personalizadas a tu ritmo.' }}
            </p>
        </div>
    </div>

</div>

        </div>
    </section>


<!-- Start About Section -->
<section class="td_shape_section_9"
         style="text-align:center; display:flex; flex-direction:column; align-items:center; justify-content:center;">
    <div class="td_height_112 td_height_lg_75"></div>

    <div class="container" style="text-align:center;">
        <div class="row td_gap_y_40 align-items-center" style="width:100%; display:flex; justify-content:center;">

            @if(
                !empty(trim(strip_tags($model->title_bloque_1 ?? ''))) &&
                !empty(trim(strip_tags($model->text_bloque_1 ?? ''))) &&
                !empty(trim(strip_tags($model->text_bloque_2 ?? '')))
            )

                {{-- ================= CONTENIDO DINÁMICO ================= --}}

                <!-- Título -->
                <h2 class="td_section_title td_fs_36 td_mb_20">
                    {!! $model->title_bloque_1 !!}
                </h2>

                <!-- Imagen -->
                <div class="col-lg-5 margena">
                    @isset($model->images['Imagen Servicios'][0])
                        <img src="{{ $model->images['Imagen Servicios'][0]->mediaModel->getUrl() }}"
                             alt="{{ strip_tags($model->title_bloque_1) }}"
                             class="td_radius_10">
                    @endisset
                </div>

                <!-- Contenido -->
                <div class="col-lg-7 wow fadeInRight margenb"
                     data-wow-duration="0.5s"
                     data-wow-delay="0.2s">

                    <p class="td_fs_18 td_mb_30">
                        {!! $model->text_bloque_1 !!}
                    </p>

                    <br><hr><br>

                    <ul class="td_mb_40" style="text-align: justify">
                        {!! $model->text_bloque_2 !!}

                        @if(!empty($model->text_btn1) && !empty($model->url_btn1))
                            <a href="{{ $model->url_btn1 }}"
                               class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow td_accent_bg td_white_color">
                                {{ $model->text_btn1 }}
                            </a>
                        @endif
                    </ul>

                </div>

            @else

                {{-- ================= CONTENIDO ESTÁTICO (FALLBACK) ================= --}}

                <!-- Título -->
                <h2 class="td_section_title td_fs_36 td_mb_20">
                    <span style="color: #a4a22d;">Mucho más que clases:</span>
                    aprende, practica y crece en portugués
                </h2>

                <!-- Imagen -->
                <div class="col-lg-5 margena">
                    <img src="https://www.academiafalasportugues.com/storage/media/images/51/about_img_1.jpg"
                         alt="Mucho más que clases: aprende, practica y crece en portugués"
                         class="td_radius_10">
                </div>

                <!-- Contenido -->
                <div class="col-lg-7 wow fadeInRight margenb"
                     data-wow-duration="0.5s"
                     data-wow-delay="0.2s">

                    <p class="td_fs_18 td_mb_30">
                        En <strong>Falas Português</strong> las clases no son solo teoría:
                        hablamos, debatimos, escuchamos y nos sumergimos en la cultura desde el primer día.
                        Ya sea online o presencial, adaptamos el aprendizaje a tu ritmo y objetivos.
                    </p>

                    <br><hr><br>

                    <ul class="td_mb_40" style="text-align: justify">
                        <li><strong>Profesora nativa con experiencia</strong></li>
                        <li><strong>Clases prácticas y participativas</strong></li>
                        <li><strong>Material actualizado y recursos digitales</strong></li>
                        <li><strong>Preparación para exámenes y objetivos reales</strong></li>

                        <a href="/cursos"
                           class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow td_accent_bg td_white_color">
                            Descubre nuestros Servicios
                        </a>
                    </ul>

                </div>

            @endif

        </div>
    </div>

    <div class="td_height_120 td_height_lg_80"></div>
</section>
<!-- End About Section -->



    <div class="container-custom2" style="max-width: 1660px;">
        <x-service-list class="service__slider-glide"/>
    </div>




    <x-testimonial-items/>

@endsection

