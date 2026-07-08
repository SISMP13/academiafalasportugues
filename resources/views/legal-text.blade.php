@extends('layout.app')
@section('metaFields')
    @livewire('meta-fields',
    [
    'metaTitle' => $model->meta_title,
    'metaDescription' => $model->meta_description,
    'metaKeywords' => $model->meta_keywords,
    'legal/'.$model->slug,
    ]
    )
@endsection
@section('content')
    @isset($generalConfiguration->images['Imagen social'][0])
        <div class="breadcrumb-wrapper"
             style="background-image: url({{$generalConfiguration->images['Imagen social'][0]->mediaModel->getUrl()}})">
            <div class="header-space"></div>
            <div class="container">
                <div class="row breadcrumb__section">
                    <div class="col-md-12">
                        <div class="text text-center">
                            <div class="heading">
                                <h1 class="text-white">{{$model->title}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset

    <div class="regular-page default-page">
        <div class="container-custom2" style="max-width: 1100px;">
            <div style="text-align:justify;">
                <div class="row td_gap_y_40 align-items-center" style="width:100%; display:flex; justify-content:center;" id="form">
                    <!-- Título principal -->
                    <h2 class="td_section_title td_fs_36 td_mb_20">
                         <span style="color:#a8a611;">{{$model->title}}</span>
                    </h2>
                            {!! $model->text !!}

                </div>
            </div>
        </div>
    </div>

@endsection
