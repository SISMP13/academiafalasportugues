<?php

namespace Bittacora\MediaIntegrations\View\Components;

use Bittacora\MediaIntegrations\Facades\MediaIntegrationsFacade;
use Illuminate\View\Component;

class TiktokMediaIntegration extends Component
{
    public mixed $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $tiktoks = MediaIntegrationsFacade::getIntegrationsByType($this->model, "tiktok");
        return view('media-integrations::components.public.tiktok-media-integration', compact('tiktoks'));
    }
}
