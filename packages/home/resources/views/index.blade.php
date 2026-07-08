@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Portada')

@section('content')
<div class="card bcard">
    <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
        <h4 class="text-120 mb-0">
            <span class="text-90">Portada</span>
        </h4>

        @include('language::partials.form-languages', [
            'model' => $model,
            'edit_route_name' => 'home.index',
            'currentLanguage' => $language
        ])
    </div>

    <div class="alert d-flex bgc-yellow-l4 brc-yellow-m4 border-1 border-l-0 pl-3 radius-l-0 my-3" role="alert">
        <div class="position-tl h-102 border-l-4 brc-yellow mt-n1px"></div>
        <i class="fas fa-exclamation-triangle mr-3 text-180 text-yellow"></i>
        <span class="align-self-center text-yellow-d2 text-120">
            Abra cada sección para añadir la información
        </span>
    </div>

    <form class="mt-lg-3" autocomplete="off" method="post"
          action="{{ route('home.update', ['model' => $model, 'locale' => $language]) }}"
          enctype="multipart/form-data">
        @csrf

        <div id="accordion-home" class="mb-5">

            {{-- ================= SLIDERS ================= --}}
            <div class="card">
                <button type="button" data-toggle="collapse" data-target="#buttons-home1"
                        class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                    Sección portada principal <i class="fas fa-2x fa-chevron-down"></i>
                </button>

                <div class="card-body bg-light collapse" data-parent="#accordion-home" id="buttons-home1">

                    <div class="alert d-flex bgc-yellow-l4 brc-yellow-m4 border-1 border-l-0 pl-3 radius-l-0 mb-3"
                         role="alert">
                        <div class="position-tl h-102 border-l-4 brc-yellow mt-n1px"></div>

                        <i class="fas fa-exclamation-triangle mr-3 text-180 text-yellow"></i>

                        <span class="align-self-center text-yellow-d2 text-120">
                            Los slides del carrusel principal se gestionan en el módulo
                            <a href="{{ route('home-slides.index') }}" target="_blank">Slider Portada</a>.
                            Puedes añadir tantos slides como quieras, cada uno con su propia imagen.
                        </span>
                    </div>

                </div>
            </div>

            {{-- ================= BLOQUE CENTRAL ================= --}}
            <div class="card">
                <button type="button" data-toggle="collapse" data-target="#buttons-home5"
                        class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
                    Sección central <i class="fas fa-2x fa-chevron-down"></i>
                </button>

                <div class="card-body bg-light collapse" data-parent="#accordion-home" id="buttons-home5">

                    @livewire('utils::tinymce-editor', [
                        'name' => 'title_bloque_1',
                        'labelText' => 'Título bloque central',
                        'value' => $model->getTranslation('title_bloque_1', $language),
                        'locale' => $language
                    ])

                    @livewire('utils::tinymce-editor', [
                        'name' => 'text_bloque_1',
                        'labelText' => 'Texto bloque 1',
                        'value' => $model->getTranslation('text_bloque_1', $language),
                        'locale' => $language
                    ])

                    @livewire('utils::tinymce-editor', [
                        'name' => 'text_bloque_2',
                        'labelText' => 'Texto bloque 2',
                        'value' => $model->getTranslation('text_bloque_2', $language),
                        'locale' => $language
                    ])
					
					 @livewire('form::input-text', [
                        'name' => 'text_btn1',
                        'labelText' => 'Texto boton',
                        'value' => $model->getTranslation('text_btn1', $language),
                        'locale' => $language
                    ])
					
					@livewire('form::input-text', [
                        'name' => 'url_btn1',
                        'labelText' => 'Url boton',
                        'value' => $model->getTranslation('url_btn1', $language),
                        'locale' => $language
                    ])
                </div>
            </div>
			
			
			<div class="card">
    <button type="button"
            data-toggle="collapse"
            data-target="#buttons-home4"
            aria-expanded="false"
            aria-controls="buttons-home4"
            class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
        Sección testimonios <i class="fas fa-2x fa-chevron-down"></i>
    </button>

    <div class="card-body bg-light collapse"
         data-parent="#accordion-home"
         id="buttons-home4">

        <div class="alert d-flex bgc-yellow-l4 brc-yellow-m4 border-1 border-l-0 pl-3 radius-l-0 mb-3"
             role="alert">
            <div class="position-tl h-102 border-l-4 brc-yellow mt-n1px"></div>

            <i class="fas fa-exclamation-triangle mr-3 text-180 text-yellow"></i>

            <span class="align-self-center text-yellow-d2 text-120">
                Los testimonios se añaden en el módulo
                <a href="{{ route('testimonial.index') }}" target="_blank">testimonios</a>
            </span>
        </div>

    </div>
</div>


        </div>

        {{-- Multimedia --}}
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
