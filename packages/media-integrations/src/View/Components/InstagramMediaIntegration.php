<?php

namespace Bittacora\MediaIntegrations\View\Components;

use Bittacora\MediaIntegrations\Facades\MediaIntegrationsFacade;
use Illuminate\View\Component;

class InstagramMediaIntegration extends Component
{
    public mixed $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $instagrams = MediaIntegrationsFacade::getIntegrationsByType($this->model, "instagram");
        return view('media-integrations::components.public.instagram-media-integration', compact('instagrams'));
    }
}
