<?php

namespace Bittacora\MediaIntegrations\View\Components;

use Bittacora\MediaIntegrations\Facades\MediaIntegrationsFacade;
use Illuminate\Contracts\View\View;
use Closure;
use Illuminate\View\Component;

class AllMediaIntegrations extends Component
{
    public mixed $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render(): View|Closure|string
    {
        $youtubes = MediaIntegrationsFacade::getIntegrationsByType($this->model);
        $vimeos = MediaIntegrationsFacade::getIntegrationsByType($this->model, "vimeo");
        $tiktoks = MediaIntegrationsFacade::getIntegrationsByType($this->model, "tiktok");
        $x = MediaIntegrationsFacade::getIntegrationsByType($this->model, "x");
        $facebooks = MediaIntegrationsFacade::getIntegrationsByType($this->model, "facebook");
        $instagrams = MediaIntegrationsFacade::getIntegrationsByType($this->model, "instagram");
        return view('media-integrations::components.public.all-media-integrations', compact('youtubes', 'vimeos', 'tiktoks',
            'x', 'facebooks', 'instagrams'));
    }
}
