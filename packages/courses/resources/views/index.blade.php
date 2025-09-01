@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Cursos')

@section('content')
    @if(config('bpanel4-courses.activate_inscriptions'))
        <a href="{{ route('courses.course-inscriptions.index') }}" class="btn btn-small btn-secondary mb-3">
            <i class="fas fa-file-alt"></i> Ir a inscripciones
        </a>
    @endif
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0">
            <h4 class="text-120 mb-0">
                <span class="text-90">Listado de cursos</span>
            </h4>
        </div>
        <div class="card-body">
            @livewire('courses::courses-datatable')
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ Vite::asset('vendor/bittacora/bpanel4-panel/resources/assets/js/livewire-sortable.js') }}"></script>
@endpush
