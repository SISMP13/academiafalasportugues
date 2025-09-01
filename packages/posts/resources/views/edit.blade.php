@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Editar '. config('bpanel4-posts.name-module'))

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Editar {{config('bpanel4-posts.name-module')}}</span>
            </h4>
            @include('language::partials.form-languages', ['model' => $model, 'edit_route_name' => 'posts.edit',  'currentLanguage' => $language])
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{route('posts.update', ['model' => $model])}}" enctype="multipart/form-data">
            @csrf
            @livewire('form::input-date', ['name' => 'date', 'labelText' => 'Fecha', 'dateFormat' => 'Y-m-d', 'value' => $model->date, 'fieldWidth' => 3])
            @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título', 'required'=>true, 'value' => $model->title])
            @livewire('form::input-text', ['name' => 'title_2', 'labelText' => 'Título corto imagen', 'required'=>false, 'value' => $model->title_2])
            @livewire('form::input-text', ['name' => 'title_3', 'labelText' => 'Enlace video', 'required'=>false, 'value' => $model->title_3])
            @livewire('utils::tinymce-editor', ['name' => 'short_text', 'labelText' => 'Texto corto', 'value' => $model->short_text])
            @livewire('utils::tinymce-editor', ['name' => 'long_text', 'labelText' => 'Texto', 'value' => $model->long_text])


            {{--@livewire('utils::tinymce-editor', ['name' => 'long_text_2', 'labelText' => 'Texto bloque 3', 'value' => $model->long_text_2])--}}
            {{--@livewire('form::input-text', ['name' => 'breadcrumb', 'labelText' => 'Migas de pan', 'required'=>false, 'value' => $model->breadcrumb])--}}

            @livewire('form::input-checkbox', [
            'name' => 'active',
            'value' => 1,
            'labelText' => 'Activo',
            'bpanelForm' => true,
            'checked' => $model->active == 1,
            ])

            @livewire('content-multimedia::upload-content-multimedia-widget', ['model' => $model, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])
            @livewire('content-multimedia-images::content-multimedia-images-widget', ['module' => 'posts', 'contentId' => $model->content->id, 'permission' => 'posts.edit'])
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
       {{-- <x-media-integrations::bpanel.integration-media :model="$model" />--}}
        @livewire('multimedia::multimedia-images-library')
    </div>
@endsection
@push('scripts')
    <script>
        window.addEventListener('show-edit-modal', () => {
            $('#editIntegrationModal').modal('show');
        });

        window.addEventListener('hide-edit-modal', () => {
            $('#editIntegrationModal').modal('hide');
        });
    </script>
@endpush
