@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Portada')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Portada</span>
            </h4>
            @include('language::partials.form-languages', ['model' => $model, 'edit_route_name' => 'home.index',  'currentLanguage' => $language])
        </div>

        <div class="alert d-flex bgc-yellow-l4 brc-yellow-m4 border-1 border-l-0 pl-3 radius-l-0 my-3" role="alert">
            <div class="position-tl h-102 border-l-4 brc-yellow mt-n1px"></div>
            <i class="fas fa-exclamation-triangle mr-3 text-180 text-yellow"></i>
            <span class="align-self-center text-yellow-d2 text-120">
                Abra cada sección para añadir la información
            </span>
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('home.update', ['model' => $model, 'locale' => $language])}}" enctype="multipart/form-data">
            @csrf
            <div id="accordion-home" class="mb-5">
                <div class="card">
                    <button type="button" data-toggle="collapse" data-target="#buttons-home1" aria-expanded="false" aria-controls="buttons-home1" class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                        Sección portada principal <i class="fas fa-2x fa-chevron-down"></i>
                    </button>
                    <div class="card-body bg-light collapse" data-parent="#accordion-home" id="buttons-home1">
                        @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título', 'required'=>false, 'value' => $model->title])
                        @livewire('form::textarea', ['name' => 'text', 'labelText' => 'Texto', 'value' => $model->text])
                        {{--@livewire('utils::tinymce-editor', ['name' => 'text', 'labelText' => 'Texto', 'value' => $model->text])--}}
                        @livewire('form::input-text', ['name' => 'text_btn', 'labelText' => 'Texto del botón', 'required'=>false, 'value' => $model->text_btn])
                        @livewire('form::input-text', ['name' => 'url_btn', 'labelText' => 'Link del botón', 'required'=>false, 'value' => $model->url_btn])
                        {{--@livewire('form::input-text', ['name' => 'text_btn2', 'labelText' => 'Texto del botón 2', 'required'=>false, 'value' => $model->text_btn2])
                        @livewire('form::input-text', ['name' => 'url_btn2', 'labelText' => 'Link del botón 2', 'required'=>false, 'value' => $model->url_btn2])--}}
                        <div class="alert d-flex bgc-yellow-l4 brc-yellow-m4 border-1 border-l-0 pl-3 radius-l-0 mb-3" role="alert">
                            <div class="position-tl h-102 border-l-4 brc-yellow mt-n1px"></div>
                            <i class="fas fa-exclamation-triangle mr-3 text-180 text-yellow"></i>
                            <div class="align-self-center text-yellow-d2 text-120">
                                <ul>
                                    <li>Si no quieres que aparezca el botón no añadas nada en texto del botón</li>
                                    <li>En link del botón incluir la url completa</li>
                                    <li>La imagen se añade al final con la posición imagen portada
                                        (La primera imagen será la que aparezca en formato escritorio y la segunda en formato móvil)</li>
                                    <li>Si añades un video en portada, este prioriza a las imágenes en portada</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <button type="button" data-toggle="collapse" data-target="#buttons-home2" aria-expanded="false" aria-controls="buttons-home2" class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                        Sección sobre nosotros <i class="fas fa-2x fa-chevron-down"></i>
                    </button>
                    <div class="card-body bg-light collapse" data-parent="#accordion-home" id="buttons-home2">
                        {{--@livewire('form::input-text', ['name' => 'title2', 'labelText' => 'Título', 'required'=>false, 'value' => $model->title2])--}}
                        {{--@livewire('form::textarea', ['name' => 'text2', 'labelText' => 'Texto', 'value' => $model->text2])--}}
                        @livewire('utils::tinymce-editor', ['name' => 'text2', 'labelText' => 'Texto', 'value' => $model->text2])
                        <div class="alert d-flex bgc-yellow-l4 brc-yellow-m4 border-1 border-l-0 pl-3 radius-l-0 mb-3" role="alert">
                            <div class="position-tl h-102 border-l-4 brc-yellow mt-n1px"></div>
                            <i class="fas fa-exclamation-triangle mr-3 text-180 text-yellow"></i>
                            <span class="align-self-center text-yellow-d2 text-120">
                                Los servicios se añaden en el módulo <a href="#" target="_blank">servicios</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <button type="button" data-toggle="collapse" data-target="#buttons-home3" aria-expanded="false" aria-controls="buttons-home3" class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                        Sección frase destacada <i class="fas fa-2x fa-chevron-down"></i>
                    </button>
                    <div class="card-body bg-light collapse" data-parent="#accordion-home" id="buttons-home3">
                        @livewire('form::input-text', ['name' => 'title3', 'labelText' => 'Título', 'required'=>false, 'value' => $model->title3])
                        {{--@livewire('form::textarea', ['name' => 'text3', 'labelText' => 'Texto', 'value' => $model->text3])--}}
                        {{--@livewire('utils::tinymce-editor', ['name' => 'text3', 'labelText' => 'Texto', 'value' => $model->text3])--}}
                    </div>
                </div>

                <div class="card">
                    <button type="button" data-toggle="collapse" data-target="#buttons-home4" aria-expanded="false" aria-controls="buttons-home4" class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                        Sección testimonios <i class="fas fa-2x fa-chevron-down"></i>
                    </button>
                    <div class="card-body bg-light collapse" data-parent="#accordion-home" id="buttons-home4">
                        {{--@livewire('form::input-text', ['name' => 'title4', 'labelText' => 'Título', 'required'=>false, 'value' => $model->title4])--}}
                        {{--@livewire('form::textarea', ['name' => 'text4', 'labelText' => 'Texto', 'value' => $model->text4])--}}
                        {{--@livewire('utils::tinymce-editor', ['name' => 'text4', 'labelText' => 'Texto', 'value' => $model->text4])--}}
                        <div class="alert d-flex bgc-yellow-l4 brc-yellow-m4 border-1 border-l-0 pl-3 radius-l-0 mb-3" role="alert">
                            <div class="position-tl h-102 border-l-4 brc-yellow mt-n1px"></div>
                            <i class="fas fa-exclamation-triangle mr-3 text-180 text-yellow"></i>
                            <span class="align-self-center text-yellow-d2 text-120">
                                Los testimonios se añaden en el módulo <a href="#" target="_blank">testimonios</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @livewire('content-multimedia::upload-content-multimedia-widget', ['model' => $model, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])
            @livewire('content-multimedia-images::content-multimedia-images-widget', ['module' => 'home', 'contentId' => $model->content->id, 'permission' => 'home.index'])
            @livewire('content-multimedia-video::content-multimedia-video-widget', ['contentId' => $model->content->id, 'permission' => 'home.index'])
            @livewire('utils::created-updated-info', ['model' => $model])

            <div class="col-12 mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 d-flex justify-content-center">
                @livewire('form::save-button',['theme'=>'save'])
                @livewire('form::save-button',['theme'=>'reset'])
            </div>
            @livewire('form::input-hidden', ['name' => 'locale', 'value'=> $language])
            @livewire('form::input-hidden', ['name' => 'id', 'value'=> $model->id])
            <input type="hidden" name="_method" value="PUT">
        </form>
        @livewire('multimedia::multimedia-images-library')
    </div>
@endsection
