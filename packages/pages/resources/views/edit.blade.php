@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Editar página')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Editar página</span>
            </h4>
            @include('language::partials.form-languages', ['model' => $model, 'edit_route_name' => 'pages.edit',  'currentLanguage' => $language])
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('pages.update', ['model' => $model])}}" enctype="multipart/form-data">
            @csrf
            @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título', 'required'=>true, 'value' => $model->title])
            @livewire('form::input-text', ['name' => 'subtitle', 'labelText' => 'Subtítulo', 'required'=>false, 'value' => $model->subtitle])
            @livewire('utils::tinymce-editor', ['name' => 'text', 'labelText' => 'Texto', 'value' => $model->text])

            @livewire('form::input-text', ['name' => 'title_2', 'labelText' => 'Título bloque 1', 'required'=>false, 'value' => $model->title_2])
            @livewire('utils::tinymce-editor', ['name' => 'long_text', 'labelText' => 'Texto bloque 1', 'value' => $model->long_text])

            @livewire('form::input-text', ['name' => 'title_4', 'labelText' => 'Título bloque 2', 'required'=>false, 'value' => $model->title_4])
            @livewire('form::input-text', ['name' => 'title_3', 'labelText' => 'Subtítulo bloque 2', 'required'=>false, 'value' => $model->title_3])
            @livewire('utils::tinymce-editor', ['name' => 'long_text_2', 'labelText' => 'Texto bloque 2', 'value' => $model->long_text_2])

            @livewire('utils::tinymce-editor', ['name' => 'long_text_3', 'labelText' => 'Texto bloque 3', 'value' => $model->long_text_3])
            @livewire('utils::tinymce-editor', ['name' => 'text2', 'labelText' => 'Texto bloque 4', 'value' => $model->text2])
            {{--@livewire('form::input-text', ['name' => 'breadcrumb', 'labelText' => 'Migas de pan', 'required'=>false, 'value' => $model->breadcrumb])--}}

            @livewire('form::input-checkbox', [
            'name' => 'active',
            'value' => 1,
            'labelText' => 'Activo',
            'bpanelForm' => true,
            'checked' => $model->active == 1,
            ])


            @livewire('content-multimedia::upload-content-multimedia-widget', ['model' => $model, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])
            <div class="alert d-flex bgc-yellow-l4 brc-yellow-m4 border-1 border-l-0 pl-3 radius-l-0 mb-3" role="alert">
                <div class="position-tl h-102 border-l-4 brc-yellow mt-n1px"></div>
                <i class="fas fa-exclamation-triangle mr-3 text-180 text-yellow"></i>
                <div class="align-self-center text-yellow-d2 text-120">
                    <ul>
                        <li>Si añades una imagen de portada se le añadirá automáticamente un fondo por defecto</li>
                        <li>Las imágenes en bloque solo aparecerán si has añadido los textos en bloque correspondientes</li>
                    </ul>
                </div>
            </div>
            @livewire('content-multimedia-images::content-multimedia-images-widget', ['module' => 'pages', 'contentId' => $model->content->id, 'permission' => 'pages.edit'])
            @livewire('seo::seo-fields', ['model' => $model])
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
