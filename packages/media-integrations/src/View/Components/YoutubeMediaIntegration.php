<?php

namespace Bittacora\MediaIntegrations\View\Components;

use Bittacora\MediaIntegrations\Facades\MediaIntegrationsFacade;
use Illuminate\View\Component;

class YoutubeMediaIntegration extends Component
{
    public mixed $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $youtubes = MediaIntegrationsFacade::getIntegrationsByType($this->model);
        return view('media-integrations::components.public.youtube-media-integration', compact('youtubes'));
    }
}
