<?php

namespace Bittacora\MediaIntegrations\View\Components;

use Bittacora\MediaIntegrations\Facades\MediaIntegrationsFacade;
use Illuminate\View\Component;

class XMediaIntegration extends Component
{
    public mixed $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $x = MediaIntegrationsFacade::getIntegrationsByType($this->model, "x");
        return view('media-integrations::components.public.x-media-integration', compact('x'));
    }
}
