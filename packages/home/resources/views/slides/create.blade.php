@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Crear slide')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Crear slide</span>
            </h4>
            <img src="{{asset('img/flags/'.$language.'.png')}}" alt="{{ $language }}">
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('home-slides.store')}}" enctype="multipart/form-data">
            @csrf
            @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título'])
            @livewire('form::textarea', ['name' => 'text', 'labelText' => 'Texto'])

            @livewire('form::input-text', ['name' => 'text_btn', 'labelText' => 'Texto del botón'])
            @livewire('form::input-text', ['name' => 'url_btn', 'labelText' => 'Link del botón'])

            @livewire('form::input-text', ['name' => 'text_btn2', 'labelText' => 'Texto del botón 2'])
            @livewire('form::input-text', ['name' => 'url_btn2', 'labelText' => 'Link del botón 2'])

            @livewire('form::input-checkbox', ['name' => 'active', 'value' => 1, 'labelText' => 'Activo', 'bpanelForm' => true, 'checked' => true])

            <div class="alert d-flex bgc-yellow-l4 brc-yellow-m4 border-1 border-l-0 pl-3 radius-l-0 my-3" role="alert">
                <div class="position-tl h-102 border-l-4 brc-yellow mt-n1px"></div>
                <i class="fas fa-exclamation-triangle mr-3 text-180 text-yellow"></i>
                <span class="align-self-center text-yellow-d2 text-120">
                    Guarda el slide para poder subir su imagen.
                </span>
            </div>

            <div class="col-12 mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 d-flex justify-content-center">
                @livewire('form::save-button',['theme'=>'save'])
                @livewire('form::save-button',['theme'=>'reset'])
            </div>
            @livewire('form::input-hidden', ['name' => 'locale', 'value'=> $language])
        </form>
    </div>
@endsection
