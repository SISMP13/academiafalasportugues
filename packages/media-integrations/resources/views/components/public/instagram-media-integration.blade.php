@if($instagrams->isNotEmpty())
    <div class="media__integrations-wrapper media__integrations-instagram">
        @foreach($instagrams as $integration)
            {!! $integration->url !!}
        @endforeach
    </div>
@endif
