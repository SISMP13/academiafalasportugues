@extends('layout.app')
@section('metaFields')
    @livewire('meta-fields',
    [
    'metaTitle' => __('Portuguese language classes in Badajoz and online'),
    'metaDescription' => $generalConfiguration->meta_description,
    'metaKeywords' => $generalConfiguration->meta_keywords,
    ]
    )
@endsection

@push('styles')
    <style>

        .td_site_header.td_style_1.td_type_2 {
             -webkit-box-shadow: 2px 2px 50px 0px rgba(255, 255, 255, 0);
             box-shadow: 2px 2px 50px 0px rgba(255, 255, 255, 0);
            background-color: #fff;
        }

        .header-spacer {
            height: 69px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* Reset básico */
        .section_hero {
            font-family: Arial, sans-serif;
            color: #222;
            background: #ffffff;
            line-height: 1.5;
            padding: 20px;
        }

        .container_hero {
            max-width: 1800px;
            margin: 0 auto;
            padding: 20px;
        }

        /**/
        .t_center {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-top: 13px;
        }
        /* Círculos decorativos */
        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            z-index: 0;
        }

        .hero::before {
            width: 11%;
            height: 31%;
            background: #fff;
            top: 13%;
            right: 14%;
        }

        /* Círculo rojo */
        .hero::after {
            width: 16%;
            height: 43%;
            background: #e00000;
            top: 34%;
            right: -6%;
        }

        /* Ajuste para que contenido esté encima */
        .hero-content,
        .hero-image {
            position: relative;
            z-index: 1;
        }

        /* Sombras en botones */
        .btn {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        /* Sombras en car */
        .car {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .car:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }


        /**/

        /* Hero principal */
        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px;
            border-radius: 18px;
            background: linear-gradient(to right, #f8f7f5 0%, #f1efec 40%, #c3bab1 100%);
            margin-bottom: 15px;
            gap: 20px;
            max-height: 700px;
            overflow: hidden;
        }
        .hero-content {
            max-width: 36%;
            margin-left: 52px;
        }

        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 40px;
        }

        .hero p {
            margin-bottom: 50px;
            font-size: 1.1rem;
        }

        .hero-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .btn-green {
            background: #a4a22d;
            color: #000000;
        }

        .btn-black {
            background: #000;
            color: #fff;
        }

        .hero-image {
            flex: 1;
            overflow: hidden;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            transform: scale(1.0) translateY(116px);
            transition: transform 0.3s ease-in-out;
        }

        .cars {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }




        .car {
            position: relative;
            overflow: hidden;
            /* evita que la imagen se salga */
            display: flex;
            flex-direction: row-reverse;
            border-radius: 18px;
            background: linear-gradient(to right, #f8f7f5 0%, #f1efec 40%, #d8d3cd 100%);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .car img {
            width: 74%;
            height: 269px;
            object-fit: cover;
            object-position: 95% 50%;
            /* más a la derecha (95%) y centrado vertical (50%) */
            transition: transform 0.3s ease-in-out;
        }


        .car-text {
            padding: 15px;
        }

        .car-text h3 {
            margin-bottom: 8px;
            font-size: 1.2rem;
        }



        /* Responsive */
        @media (max-width: 768px) {

            .change__cookies {
                position: fixed;
                bottom: -1px;
                left: 9px;
                z-index: 1020;
                color: #fff;
                text-align: center;
                padding: .3rem;
                font-size: 1rem;
                background-color: #000;
            }

            .t_center {
                margin-top: 9px;
            }

            .hero {
                flex-direction: column;
                text-align: center;
                padding: 0;

                position: relative;
                display: flex;
                align-items: center;
                justify-content: space-between;
background: white;
                border-radius: 12px;

                margin-bottom: 15px;
                gap: 0px;
                max-height: 925px;
                overflow: hidden;
            }
            .hero-content {
                max-width: 100%;
                /* margin-top: 72px; */
                /* margin-left: 2px; */
                margin: 59px 9px 0px 9px;
            }

            .hero h1 {
                font-size: 2.2rem;
                margin-bottom: 5px;
            }
            .hero-buttons {
                gap: 27px;
                margin: 10px 12px 12px 22px;
            }


            .hero-image img {
                max-width: 153%;
                height: auto;
                border-radius: 8px;
                transform: scale(1.1) translateY(-20px);
                transition: transform 0.3s ease-in-out;
            }

            .car {
                grid-template-columns: 1fr;
            }

            .hero::after {
                width: 0;
            }

            .hero::before {
                width: 0;
            }

            /**/

            /* Cards */
            .cars {
                display: flex;
                flex-direction: column;
                gap: 20px;
                margin-top: 30px;
            }

            .car {
                display: flex;
                align-items: center;
                justify-content: row-reverse;
                background: #f7f7f7;
                border-radius: 10px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            /* Texto a la izquierda */
            .car-text {
                flex: 1;
                text-align: left;
                margin-right: 15px;

            }

            /* Imagen a la derecha */
            .car img {
                max-width: 140px;
                height: auto;
                border-radius: 6px;
                flex-shrink: 0;

            }



            .border__wrapper.no-banner {
                position: fixed;
                top: -2px;
            }

        }
    </style>
@endpush


@section('content')
    {{--crear componenente de blade para el listado de cursos | Variables: title, listado de cursos y limite de cursos | (utilidad en la home y en la ficha del curso para ver otros cursos)--}}
    {{--crear componente de blade para el car del curso | Variables curso | utilidad en una hipotetica pagina de cursos (porque se podria mostrar de una forma diferente al listado pero el car sería igual) --}}
    {{--crear componenente de blade para los testimonios si hay modulo de testimonios en bPanel | variables title, listado de testimonios y limite | por si se quiere agregar en otras páginas y no solo en la home --}}


    <section class=" t_center" style="background: white;">
        <div class="container" style="max-width: 1830px; background: white;">
            <!-- Hero principal -->
            <div class="hero">
                <div class="hero-content">
                    <h1>Tu camino hacia el portugués empieza aquí</h1>
                    <p>Cursos y formación en portugués para empresas y particulares</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-green">EMPRESAS</a>
                        <a href="#" class="btn btn-black">PARTICULARES</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('assets/image/web/img1.png') }}" alt="Persona con portátil">
                </div>
            </div>

            <!-- Cards -->
            <div class="cars">
                <div class="car">
                    <img src="{{ asset('assets/image/web/img2.png') }}" alt="Empresas">
                    <div class="car-text">
                        <h3>Empresas</h3>
                        <p>Aprende en grupo, en un entorno real y cercano.</p>
                    </div>
                </div>
                <div class="car">
                    <img src="{{ asset('assets/image/web/img3.png') }}" alt="Cursos">
                    <div class="car-text">
                        <h3>Cursos</h3>
                    </div>
                </div>
                <div class="car">
                    <img src="{{ asset('assets/image/web/img4.png') }}" alt="Particulares">
                    <div class="car-text">
                        <h3>Particulares</h3>
                    </div>
                </div>

            </div>

        </div>
</section>



    <!-- Start About Section -->
    <section class="td_shape_section_9" style="text-align:center; display:flex; flex-direction:column; align-items:center; justify-content:center;">
        <div class="td_height_112 td_height_lg_75"></div>
        <div class="container" style="text-align:center;">
            <div class="row td_gap_y_40 align-items-center" style="width:100%; display:flex; justify-content:center;">
                <!-- Título principal -->
                <h2 class="td_section_title td_fs_36 td_mb_20"
                    style="margin:0 auto; text-align:center; max-width:900px; line-height:1.3;">
                    <span class="td_accent_color td_semibold">Mucho más que clases:</span>
                    aprende, practica y crece en portugués
                </h2>
                <!-- Columna izquierda: Imagen -->
                <div class="col-lg-6">
                    <img src="{{ asset('assets/template/img/home_3/about_img_1.jpg') }}"
                         alt="Clases de portugués"
                         class="td_radius_10">
                </div>

                <!-- Columna derecha: Contenido -->
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">



                    <!-- Párrafo descriptivo -->
                    <p class="td_fs_18 td_mb_30">
                        En <strong>Falas Português</strong> las clases no son solo teoría: hablamos,
                        debatimos, escuchamos y nos sumergimos en la cultura desde el primer día.
                        Ya sea online o presencial, adaptamos el aprendizaje a tu ritmo y objetivos.
                    </p>

                    <!-- Lista de beneficios -->
                    <ul class="  td_mb_40">
                        <li>
                            <i class="fas fa-check-circle td_accent_color td_fs_20 me-2"></i>
                           <b>Profesora nativa con experiencia</b>
                        </li>
                        <li>
                            <i class="fas fa-check-circle td_accent_color td_fs_20 me-2"></i>
                            <b>Clases prácticas y participativas</b>
                        </li>
                        <li>
                            <i class="fas fa-check-circle td_accent_color td_fs_20 me-2"></i>
                            <b>Material actualizado y recursos digitales</b>
                        </li>
                        <li>
                            <i class="fas fa-check-circle td_accent_color td_fs_20 me-2"></i>
                            <b>Preparación para exámenes y objetivos reales</b>
                        </li>
                    </ul>

                    <!-- Botón -->
                    <a href="#"
                       class="td_btn td_style_1 td_radius_30 td_medium td_with_shadow td_accent_bg td_white_color">
                        Descubre nuestros Servicios
                    </a>
                </div>
            </div>
        </div>
        <div class="td_height_120 td_height_lg_80"></div>
    </section>
    <!-- End About Section -->




    <div class="container-custom2">
        <x-service-list class="service__slider-glide"/>
    </div>


    <!-- Start Hero Section -->
    <section class="td_hero td_style_3 td_center td_hobble" style="height: 445px;">
        <div class="container">
            <div class="td_hero_text wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                <p class="td_hero_subtitle_up td_fs_18 td_accent_color td_spacing_1 td_semibold text-uppercase td_mb_14">100 % Quality Qurantee</p>
                <h1 class="td_hero_title td_fs_64 td_mb_20">Build The Skills You Need To Be Successful</h1>
                <p class="td_hero_subtitle td_fs_18 td_heading_color td_opacity_7 td_mb_30">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="td_btns_group">
                    <a href="courses-grid-view.html" class="td_btn td_style_1 td_radius_30 td_medium">
              <span class="td_btn_in td_white_color td_accent_bg">
                <span>Explore All Courses</span>
                <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
                    </a>

                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->


    <x-testimonial-items/>

@endsection

