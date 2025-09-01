@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Términos legales')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0">
            <h4 class="text-120 mb-0">
                <span class="text-90">Listado de términos legales</span>
            </h4>
        </div>
        <div class="card-body">
            @livewire('legal-text::legal-text-datatable')
        </div>
    </div>
@endsection
