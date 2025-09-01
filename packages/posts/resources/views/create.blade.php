@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Crear '. config('bpanel4-posts.name-module'))

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Crear {{config('bpanel4-posts.name-module')}}</span>
            </h4>
            <img src="{{asset('img/flags/'.$language.'.png')}}" alt="{{ $language }}">
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            @livewire('form::input-date', ['name' => 'date', 'labelText' => 'Fecha', 'dateFormat' => 'Y-m-d', 'value' => date('Y-m-d'), 'fieldWidth' => 3])
            @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título', 'required'=>true])
            {{--@livewire('utils::tinymce-editor', ['name' => 'short_text', 'labelText' => 'Texto corto', 'value' => old('short_text')])--}}
            {{--@livewire('form::input-text', ['name' => 'title_2', 'labelText' => 'Título bloque 2', 'required'=>false, 'value' => old('title_2')])--}}
            @livewire('utils::tinymce-editor', ['name' => 'long_text', 'labelText' => 'Texto', 'value' => old('long_text')])
            {{--@livewire('form::input-text', ['name' => 'title_3', 'labelText' => 'Título bloque 3', 'required'=>false, 'value' => old('title_3')])--}}
            {{--@livewire('utils::tinymce-editor', ['name' => 'long_text_2', 'labelText' => 'Texto bloque 3', 'value' => old('long_text_2')])--}}
            {{--@livewire('form::input-text', ['name' => 'breadcrumb', 'labelText' => 'Migas de pan', 'required'=>false, 'value' => old('breadcrumb')])--}}
            @livewire('form::input-checkbox', ['name' => 'active', 'value' => 1, 'labelText' => 'Activo', 'bpanelForm' => true, 'checked' => true])
            {{--@livewire('form::input-checkbox', ['name' => 'featured', 'value' => 0, 'labelText' => 'Destacado', 'bpanelForm' => true, 'checked' => false])--}}
            @livewire('content-multimedia::upload-content-multimedia-widget', ['model' => null, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])
            @livewire('seo::seo-fields', ['autoMetaTitleSelector' => '#title'])


            <div class="col-12 mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 d-flex justify-content-center">
                @livewire('form::save-button',['theme'=>'save'])
                @livewire('form::save-button',['theme'=>'reset'])
            </div>
            @livewire('form::input-hidden', ['name' => 'locale', 'value'=> $language])
        </form>
        @livewire('multimedia::multimedia-images-library')
    </div>
@endsection
