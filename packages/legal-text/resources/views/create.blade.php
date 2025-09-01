@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Crear Término legal')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Crear término legal</span>
            </h4>
            <img src="{{asset('img/flags/'.$language.'.png')}}" alt="{{ $language }}">
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('legal-text.store')}}" enctype="multipart/form-data">
            @csrf
            @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título', 'required'=>true])
            @livewire('utils::tinymce-editor', ['name' => 'text', 'labelText' => 'Texto', 'value' => old('text')])
            @livewire('form::input-checkbox', ['name' => 'active', 'value' => 1, 'labelText' => 'Activo', 'bpanelForm' => true, 'checked' => true])
            {{--@livewire('content-multimedia::upload-content-multimedia-widget', ['model' => null, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])--}}
            @livewire('seo::seo-fields', ['autoMetaTitleSelector' => '#title'])


            <div class="col-12 mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 d-flex justify-content-center">
                @livewire('form::save-button',['theme'=>'save'])
                @livewire('form::save-button',['theme'=>'reset'])
            </div>
            @livewire('form::input-hidden', ['name' => 'locale', 'value'=> $language])
        </form>
        {{--@livewire('multimedia::multimedia-images-library')--}}
    </div>
@endsection
