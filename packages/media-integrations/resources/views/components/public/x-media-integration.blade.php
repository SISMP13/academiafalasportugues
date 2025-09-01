@if($x->isNotEmpty())
    <div class="media__integrations-wrapper media__integrations-x">
        @foreach($x as $integration)
            {!! $integration->url !!}
        @endforeach
    </div>
@endif
