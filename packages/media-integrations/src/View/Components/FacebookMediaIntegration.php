<?php

namespace Bittacora\MediaIntegrations\View\Components;

use Bittacora\MediaIntegrations\Facades\MediaIntegrationsFacade;
use Illuminate\View\Component;

class FacebookMediaIntegration extends Component
{
    public mixed $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $facebooks = MediaIntegrationsFacade::getIntegrationsByType($this->model, "facebook");
        return view('media-integrations::components.public.facebook-media-integration', compact('facebooks'));
    }
}
