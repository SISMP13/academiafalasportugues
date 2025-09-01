@if($vimeos->isNotEmpty())
    <div class="media__integrations-wrapper media__integrations-vimeo">
        @foreach($vimeos as $integration)
            @if($integration->id !== false)
                <div class="ratio ratio-16x9 mb-3">
                    <iframe src="https://player.vimeo.com/video/{{$integration->integration_id}}" allowfullscreen></iframe>
                </div>
            @endif
        @endforeach
    </div>
@endif
