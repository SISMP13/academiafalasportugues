@if($facebooks->isNotEmpty())
    <div class="media__integrations-wrapper media__integrations-facebook">
        @foreach($facebooks as $integration)
            {!! $integration->url !!}
        @endforeach
    </div>
@endif
