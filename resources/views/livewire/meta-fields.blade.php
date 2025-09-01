@section('metaFields')
    <title>
        @if(!is_null($metaTitle))
            @if($metaTitle != $generalConfiguration->meta_title)
                {{$metaTitle}} |
            @endif
        @endif
        {{$generalConfiguration->meta_title}}
    </title>
    <link rel="canonical" href="@if(is_null($ogUrl)){{config("app.url")}}@else{{config("app.url")}}/{{$ogUrl}}@endif">
    <meta name="description" content="@if(is_null($metaDescription)){{$generalConfiguration->meta_description}}@else{{$metaDescription}}@endif"/>
    <meta name="keywords" content="@if(is_null($metaKeywords)){{$generalConfiguration->meta_keywords}}@else{{$metaKeywords}}@endif"/>
    <meta name="author" content="{{$generalConfiguration->meta_title}}" />
    <meta name="copyright" content="{{$generalConfiguration->meta_title}}" />

    <meta property="og:description" content="@if(is_null($metaDescription)){{$generalConfiguration->meta_description}}@else{{$metaDescription}}@endif">
    <meta property="og:url" content="@if(is_null($ogUrl)){{config("app.url")}}@else{{config("app.url")}}/{{$ogUrl}}@endif">
    @if(!is_null($socialImage))
        <meta property="og:image" content="{{$socialImage->mediaModel->getUrl()}}" />
    @else
        @isset($generalConfiguration->images['Imagen social'][0])
            <meta property="og:image" content="{{$generalConfiguration->images['Imagen social'][0]->mediaModel->getUrl()}}" />
        @endisset
    @endif

    <meta property="og:type" content="website" />
    <meta property="og:title" content="@if(!is_null($metaTitle)){{$metaTitle}} - @endif{{$generalConfiguration->meta_title}}" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@{{ config('app.name') }}">
    <meta name="twitter:creator" content="@{{ config('app.name') }}">
    <meta name="twitter:description" content="@if(is_null($metaDescription)){{$generalConfiguration->meta_description}}@else{{$metaDescription}}@endif">
    <meta name="twitter:title" content="@if(!is_null($metaTitle)){{$metaTitle}} - @endif{{$generalConfiguration->meta_title}}">
    @if(!is_null($socialImage))
        <meta name="twitter:image" content="{{$socialImage->mediaModel->getUrl()}}" />
    @else
        @isset($generalConfiguration->images['Imagen social'][0])
            <meta name="twitter:image" content="{{$generalConfiguration->images['Imagen social'][0]->mediaModel->getUrl()}}" />
        @endisset
    @endif
@endsection
