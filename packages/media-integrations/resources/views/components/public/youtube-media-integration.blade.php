@if($youtubes->isNotEmpty())
    <div class="media__integrations-wrapper media__integrations-youtube">
        @foreach($youtubes as $integration)
            @if($integration->id !== false)
                <div class="ratio ratio-16x9 mb-3">
                    <iframe src="https://www.youtube.com/embed/{{$integration->integration_id}}" title="{{ $integration->title }}" allowfullscreen></iframe>
                </div>
            @endif
        @endforeach
    </div>
@endif
