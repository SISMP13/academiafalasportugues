@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Editar curso')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Editar curso</span>
            </h4>
            @include('language::partials.form-languages', ['model' => $model, 'edit_route_name' => 'courses.edit',  'currentLanguage' => $language])
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('courses.update', ['model' => $model])}}" enctype="multipart/form-data">
            @csrf
            @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título', 'required'=>true, 'value' => $model->title])
            @livewire('utils::tinymce-editor', ['name' => 'text_info', 'labelText' => 'Información del curso', 'value' => $model->text_info])
            @livewire('utils::tinymce-editor', ['name' => 'text', 'labelText' => 'Texto', 'value' => $model->text])
            @livewire('form::input-checkbox', [
            'name' => 'active',
            'value' => 1,
            'labelText' => 'Activo',
            'bpanelForm' => true,
            'checked' => $model->active == 1,
            ])

            @if(config('bpanel4-courses.activate_inscriptions'))
                @livewire('form::input-checkbox', [
                'name' => 'inscription',
                'value' => 1,
                'labelText' => '¿Habilitar las inscripciones?',
                'bpanelForm' => true,
                'checked' => $model->inscription == 1,
                ])
            @endif

            @livewire('content-multimedia::upload-content-multimedia-widget', ['model' => $model, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])
            @livewire('content-multimedia-images::content-multimedia-images-widget', [
            'module' => 'courses',
            'contentId' => optional($model->content)->id,
            'permission' => 'courses.edit'
            ])

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
