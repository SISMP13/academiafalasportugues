@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Crear testimonio')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Crear testimonio</span>
            </h4>
            <img src="{{asset('img/flags/'.$language.'.png')}}" alt="{{ $language }}">
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('testimonial.store')}}" enctype="multipart/form-data">
            @csrf
            {{--@livewire('form::input-date', ['name' => 'date', 'labelText' => 'Fecha', 'dateFormat' => 'Y-m-d', 'value' => date('Y-m-d'), 'fieldWidth' => 3])--}}
            @livewire('form::input-text', ['name' => 'name', 'labelText' => 'Nombre', 'required'=>true])
            @livewire('form::textarea', ['name' => 'text', 'labelText' => 'Texto', 'required' => false, 'rows' => 6])
            {{--@livewire('form::input-number', ['name' => 'stars', 'labelText' => 'Estrellas', 'required'=>true, 'min' => 0, 'max' => 5, 'labelWidth' => 3, 'fieldWidth' => 1, 'value' => 5 ])--}}

            @livewire('form::input-checkbox', ['name' => 'active', 'value' => 1, 'labelText' => 'Activo', 'bpanelForm' => true, 'checked' => true])
            {{--@livewire('content-multimedia::upload-content-multimedia-widget', ['model' => null, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])--}}


            <div class="col-12 mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 d-flex justify-content-center">
                @livewire('form::save-button',['theme'=>'save'])
                @livewire('form::save-button',['theme'=>'reset'])
            </div>
            @livewire('form::input-hidden', ['name' => 'locale', 'value'=> $language])
        </form>
        @livewire('multimedia::multimedia-images-library')
    </div>
@endsection
