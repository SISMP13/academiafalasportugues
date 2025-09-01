@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Editar testimonio')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Editar testimonio</span>
            </h4>
            @include('language::partials.form-languages', ['model' => $model, 'edit_route_name' => 'testimonial.edit',  'currentLanguage' => $language])
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('testimonial.update', ['model' => $model])}}" enctype="multipart/form-data">
            @csrf
            {{--@livewire('form::input-date', ['name' => 'date', 'labelText' => 'Fecha', 'dateFormat' => 'Y-m-d', 'value' => $model->date, 'fieldWidth' => 3])--}}
            @livewire('form::input-text', ['name' => 'name', 'labelText' => 'Nombre', 'required'=>true, 'value' => $model->name])
            @livewire('form::textarea', ['name' => 'text', 'labelText' => 'Texto', 'value' => $model->text, 'required' => false, 'rows' => 6])
            {{--@livewire('form::input-number', ['name' => 'stars', 'labelText' => 'Estrellas', 'required'=>true, 'min' => 0, 'max' => 5, 'labelWidth' => 3, 'fieldWidth' => 1, 'value' => $model->stars ])--}}
            @livewire('form::input-checkbox', [
            'name' => 'active',
            'value' => 1,
            'labelText' => 'Activo',
            'bpanelForm' => true,
            'checked' => $model->active == 1,
            ])


            {{--@livewire('content-multimedia::upload-content-multimedia-widget', ['model' => $model, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])
            @livewire('content-multimedia-images::content-multimedia-images-widget', ['module' => 'pages', 'contentId' => $model->content->id, 'permission' => 'pages.edit'])--}}
            @livewire('utils::created-updated-info', ['model' => $model])

            <div class="col-12 mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 d-flex justify-content-center">
                @livewire('form::save-button',['theme'=>'save'])
                @livewire('form::save-button',['theme'=>'reset'])
            </div>
            @livewire('form::input-hidden', ['name' => 'locale', 'value'=> $language])
            @livewire('form::input-hidden', ['name' => 'id', 'value'=> $model->id])
            <input type="hidden" name="_method" value="PUT">
        </form>
        {{--@livewire('multimedia::multimedia-images-library')--}}
    </div>
@endsection
