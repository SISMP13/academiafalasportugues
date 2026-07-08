@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Slider Portada')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Slides del carrusel principal</span>
            </h4>
            <a href="{{ route('home-slides.create') }}" class="btn btn-primary">Añadir slide</a>
        </div>
        <div class="card-body">
            @livewire('home::home-slide-datatable')
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ Vite::asset('vendor/bittacora/bpanel4-panel/resources/assets/js/livewire-sortable.js') }}"></script>
@endpush
