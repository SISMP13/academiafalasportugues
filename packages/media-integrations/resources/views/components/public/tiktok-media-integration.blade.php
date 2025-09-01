@if($tiktoks->isNotEmpty())
    <div class="media__integrations-wrapper media__integrations-tiktok">
        @foreach($tiktoks as $integration)
            @if($integration->id !== false)
                <div class="mb-3">
                    <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@usuario/video/{{$integration->integration_id}}?autoplay=0" data-video-id="{{$integration->integration_id}}">
                        <section> </section>
                    </blockquote>
                </div>
            @endif
        @endforeach
    </div>
    <script async src="https://www.tiktok.com/embed.js"></script>
@endif
