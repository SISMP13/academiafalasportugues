@extends('bpanel4::layouts.bpanel-app')

@section('title', config('bpanel4-services.name-module'))

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0">
            <h4 class="text-120 mb-0">
                <span class="text-90">Listado de {{config('bpanel4-services.name-module')}}</span>
            </h4>
        </div>
        <div class="card-body">
            @livewire('services::services-datatable')
        </div>
    </div>
@endsection
@push('scripts')
    @if(config('bpanel4-services.sortable_datatable'))
        <script src="{{ Vite::asset('vendor/bittacora/bpanel4-panel/resources/assets/js/livewire-sortable.js') }}"></script>
    @endif
@endpush
