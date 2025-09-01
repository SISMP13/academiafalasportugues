@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Editar ' . config('bpanel4-services.name-module'))

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Editar {{config('bpanel4-services.name-module')}}</span>
            </h4>
            @include('language::partials.form-languages', ['model' => $model, 'edit_route_name' => 'services.edit',  'currentLanguage' => $language])
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('services.update', ['model' => $model])}}" enctype="multipart/form-data">
            @csrf
            @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título', 'required'=>true, 'value' => $model->title])
            {{--@livewire('form::textarea', ['name' => 'text_home', 'labelText' => 'Texto en página principal', 'value' => $model->text_home])--}}
            @livewire('utils::tinymce-editor', ['name' => 'text', 'labelText' => 'Texto', 'value' => $model->text])
            @if(config('bpanel4-services.categories'))
                <x-bpanel4-category::select :model="$model" :categories="$categories" :multiple="true"/>
            @endif
            @livewire('form::input-checkbox', [
            'name' => 'active',
            'value' => 1,
            'labelText' => 'Activo',
            'bpanelForm' => true,
            'checked' => $model->active == 1,
            ])
            @livewire('content-multimedia::upload-content-multimedia-widget', ['model' => $model, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])
            @livewire('content-multimedia-images::content-multimedia-images-widget', ['module' => 'services', 'contentId' => $model->content->id, 'permission' => 'services.edit'])
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
