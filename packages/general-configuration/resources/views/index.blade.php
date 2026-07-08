@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Configuración general')

@section('content')
    <div class="card bcard">
        <form class="mt-lg-3" autocomplete="off" method="post" action="{{ route('general-configuration.update', ['model' => $model, 'locale' => $language]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between mb-4">
                <h4 class="text-120 mb-0">
                    <span class="text-90">Editando configuración general</span>
                </h4>
                @include('language::partials.form-languages', ['model' => $model, 'edit_route_name' => 'general-configuration.index',  'currentLanguage' => $language])
            </div>
            <br>

            <div class="card bcard  mb-4">
                <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                    Correo electrónico
                </div>
                <div class="card-body">
                    @livewire('form::input-text', ['name' => 'sender_email', 'labelText' => 'Email emisor', 'value' => $model->sender_email])
                    @livewire('form::input-text', ['name' => 'sender_name', 'labelText' => 'Nombre emisor', 'value' => $model->sender_name])
                    @livewire('form::input-text', ['name' => 'reception_email', 'labelText' => 'Email receptor', 'required'=>false, 'value' => $model->reception_email])
                </div>
            </div>

            <div class="card bcard  mb-4">
                <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                    Información de la empresa
                </div>
                <div class="card-body">
                    @livewire('form::input-text', ['name' => 'business_address', 'labelText' => 'Dirección', 'value' => $model->business_address])
                    @livewire('form::input-text', ['name' => 'business_postal_code', 'labelText' => 'Código postal', 'value' => $model->business_postal_code])
                    @livewire('form::input-text', ['name' => 'business_city', 'labelText' => 'Ciudad', 'value' => $model->business_city])
                    @livewire('form::input-text', ['name' => 'business_province', 'labelText' => 'Provincia', 'value' => $model->business_province])
                    @livewire('form::input-text', ['name' => 'business_country', 'labelText' => 'País', 'value' => $model->business_country])
                    @livewire('form::input-text', ['name' => 'business_phone', 'labelText' => 'Teléfono', 'value' => $model->business_phone])

                    @livewire('form::input-text', ['name' => 'business_mobile', 'labelText' => 'Móvil', 'value' => $model->business_mobile])
                    @livewire('form::input-text', ['name' => 'business_email', 'labelText' => 'Email de contacto', 'value' => $model->business_email])
                </div>
            </div>

            <div class="card bcard  mb-4">
                <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                    Configuración SEO
                </div>
                <div class="card-body">
                    @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Nombre empresa', 'value' => $model->title])
                    @livewire('form::input-text', ['name' => 'meta_title', 'labelText' => 'Título', 'value' => $model->meta_title])
                    @livewire('form::textarea', ['name' => 'meta_description', 'labelText' => 'Descripción', 'value' => $model->meta_description])
                    @livewire('form::textarea', ['name' => 'meta_keywords', 'labelText' => 'Palabras clave', 'value' => $model->meta_keywords])
                </div>
            </div>

            <div class="card bcard  mb-4">
                <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                    Redes sociales
                </div>
                <div class="card-body">
                    @livewire('form::input-text', ['name' => 'facebook', 'labelText' => 'Facebook', 'value' => $model->facebook])
                    @livewire('form::input-text', ['name' => 'x', 'labelText' => 'X', 'value' => $model->x])
                    @livewire('form::input-text', ['name' => 'instagram', 'labelText' => 'Instagram', 'value' => $model->instagram])
                    @livewire('form::input-text', ['name' => 'tiktok', 'labelText' => 'Tiktok', 'value' => $model->tiktok])
                    @livewire('form::input-text', ['name' => 'linkedin', 'labelText' => 'Linkedin', 'value' => $model->linkedin])
                    @livewire('form::input-text', ['name' => 'youtube', 'labelText' => 'Youtube', 'value' => $model->youtube])
                    @livewire('form::input-text', ['name' => 'whatsapp', 'labelText' => 'Whatsapp', 'value' => $model->whatsapp, 'placeholder' => "Introducir número con prefijo. Ej: +34 XXX XXX XXX"])
                </div>
            </div>

            <div class="card bcard  mb-4">
                <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                    Banner Principio Web
                </div>
                <div class="card-body">
                    @livewire('form::input-text', ['name' => 'business_fax', 'labelText' => 'Texto Banner', 'value' => $model->business_fax])
                    @livewire('form::input-text', ['name' => 'banner_link', 'labelText' => 'Link Banner', 'value' => $model->banner_link])
                </div>
            </div>

            <div class="card bcard  mb-4">
                <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                    Pie de la web
                </div>
                <div class="card-body">
                    @livewire('form::input-text', ['name' => 'footer_copyright', 'labelText' => 'Copyright', 'value' => $model->footer_copyright])
                    @livewire('form::input-text', ['name' => 'footer_description', 'labelText' => 'Descripción', 'value' => $model->footer_description])
                    {{--@livewire('form::input-text', ['name' => 'footer_description', 'labelText' => 'Descripción', 'value' => $model->footer_description])--}}
                </div>
            </div>
            @livewire('content-multimedia::upload-content-multimedia-widget', ['model' => $model, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])
            @livewire('content-multimedia-images::content-multimedia-images-widget', ['contentId' => $model->content->id, 'module' => 'general-configuration', 'permission' => 'general-configuration.edit'])

            <div class="col-12 mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 d-flex justify-content-center">
                @livewire('form::save-button',['theme'=>'save'])
                @livewire('form::save-button',['theme'=>'reset'])
            </div>
            @livewire('form::input-hidden', ['name' => 'locale', 'value'=> $language])
            @livewire('form::input-hidden', ['name' => 'id', 'value'=> $model->id])
            <input type="hidden" name="_method" value="PUT">
        </form>
    </div>

    @livewire('multimedia::multimedia-images-library')
@endsection
