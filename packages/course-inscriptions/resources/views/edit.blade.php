@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Editar inscripción')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Editar inscripción</span>
            </h4>
            <a href="{{ route('courses.course-inscriptions.index') }}" class="btn btn-sm btn-light">
                <i class="fa fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="card-body">
            <div class="alert d-flex bgc-secondary-l4 brc-secondary-l2 border-1 border-l-0 pl-3 radius-l-0 mb-3" role="alert">
                <div class="position-tl h-102 border-l-4 brc-secondary mt-n1px"></div>
                <i class="fas fa-graduation-cap mr-3 text-180 text-secondary"></i>
                <span class="align-self-center text-secondary-d2 text-120">
                    Curso al que se ha inscrito:
                    <strong>{{ optional($model->course)->getTranslation('title', app()->getLocale(), true) ?? 'Sin curso asociado' }}</strong>
                </span>
            </div>
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{ route('courses.course-inscriptions.update', $model) }}">
            @csrf
            @livewire('form::input-text', ['name' => 'name', 'labelText' => 'Nombre completo', 'value' => $model->name])
            @livewire('form::input-text', ['name' => 'email', 'labelText' => 'Correo electrónico', 'value' => $model->email])
            @livewire('form::input-text', ['name' => 'phone', 'labelText' => 'Teléfono', 'value' => $model->phone])
            @livewire('form::textarea', ['name' => 'message', 'labelText' => 'Mensaje', 'value' => $model->message])

            <div class="col-12 mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 d-flex justify-content-center">
                @livewire('form::save-button',['theme'=>'save'])
                @livewire('form::save-button',['theme'=>'reset'])
            </div>

            <input type="hidden" name="_method" value="PUT">
        </form>
    </div>
@endsection
