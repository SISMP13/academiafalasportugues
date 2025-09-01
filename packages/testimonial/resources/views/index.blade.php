@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Testimonios')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0">
            <h4 class="text-120 mb-0">
                <span class="text-90">Listado de testimonios</span>
            </h4>
        </div>
        <div class="card-body">
            @livewire('testimonial::testimonial-datatable')
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ Vite::asset('vendor/bittacora/bpanel4-panel/resources/assets/js/livewire-sortable.js') }}"></script>
@endpush
