@if($youtubes->isNotEmpty() || $vimeos->isNotEmpty() || $tiktoks->isNotEmpty() || $x->isNotEmpty() || $facebooks->isNotEmpty() || $instagrams->isNotEmpty())
    <div class="container-custom2 my-5">
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
        @endif

        @if($x->isNotEmpty())
            <div class="media__integrations-wrapper media__integrations-x">
                @foreach($x as $integration)
                    {!! $integration->url !!}
                @endforeach
            </div>
        @endif

        @if($facebooks->isNotEmpty())
            <div class="media__integrations-wrapper media__integrations-facebook">
                @foreach($facebooks as $integration)
                    {!! $integration->url !!}
                @endforeach
            </div>
        @endif

        @if($instagrams->isNotEmpty())
            <div class="media__integrations-wrapper media__integrations-instagram">
                @foreach($instagrams as $integration)
                    {!! $integration->url !!}
                @endforeach
            </div>
        @endif
    </div>
    @if($tiktoks->isNotEmpty())
        <script async src="https://www.tiktok.com/embed.js"></script>
    @endif
@endif
