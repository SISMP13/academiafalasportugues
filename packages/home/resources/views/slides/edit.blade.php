@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Editar slide')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Editar slide</span>
            </h4>
            @include('language::partials.form-languages', ['model' => $model, 'edit_route_name' => 'home-slides.edit', 'currentLanguage' => $language])
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('home-slides.update', ['model' => $model])}}" enctype="multipart/form-data">
            @csrf
            @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título', 'value' => $model->getTranslation('title', $language), 'locale' => $language])
            @livewire('form::textarea', ['name' => 'text', 'labelText' => 'Texto', 'value' => $model->getTranslation('text', $language), 'locale' => $language])

            @livewire('form::input-text', ['name' => 'text_btn', 'labelText' => 'Texto del botón', 'value' => $model->getTranslation('text_btn', $language), 'locale' => $language])
            @livewire('form::input-text', ['name' => 'url_btn', 'labelText' => 'Link del botón', 'value' => $model->getTranslation('url_btn', $language), 'locale' => $language])

            @livewire('form::input-text', ['name' => 'text_btn2', 'labelText' => 'Texto del botón 2', 'value' => $model->getTranslation('text_btn2', $language), 'locale' => $language])
            @livewire('form::input-text', ['name' => 'url_btn2', 'labelText' => 'Link del botón 2', 'value' => $model->getTranslation('url_btn2', $language), 'locale' => $language])

            @livewire('form::input-checkbox', [
                'name' => 'active',
                'value' => 1,
                'labelText' => 'Activo',
                'bpanelForm' => true,
                'checked' => $model->active == 1,
            ])

            @livewire('content-multimedia::upload-content-multimedia-widget', [
                'model' => $model,
                'allowedFormats' => $allowedFormats,
                'allowedExtensions' => $allowedExtensions
            ])

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
