<?php

namespace Bittacora\MediaIntegrations\View\Components;

use Bittacora\MediaIntegrations\Facades\MediaIntegrationsFacade;
use Illuminate\View\Component;

class VimeoMediaIntegration extends Component
{
    public mixed $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $vimeos = MediaIntegrationsFacade::getIntegrationsByType($this->model, "vimeo");
        return view('media-integrations::components.public.vimeo-media-integration', compact('vimeos'));
    }
}
