@extends('layout.app')
@section('metaFields')
    @livewire('meta-fields',
    [
    'metaTitle' => $model->meta_title,
    'metaDescription' => $model->meta_description,
    'metaKeywords' => $model->meta_keywords,
    'legal/'.$model->slug,
    ]
    )
@endsection
@section('content')
    <div class="regular-page">
        <div class="container-custom2">
            <h1 class="title__h1 animate">{{$model->title}}</h1>
            <div class="pages-text mt-5">
                {!! $model->text !!}
            </div>
        </div>
    </div>
@endsection
