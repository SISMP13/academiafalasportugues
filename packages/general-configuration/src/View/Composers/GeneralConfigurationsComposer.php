<?php

namespace Bittacora\GeneralConfiguration\View\Composers;

use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\GeneralConfiguration\Models\GeneralConfigurationModel;
use Illuminate\View\View;

class GeneralConfigurationsComposer
{
    public function compose(View $view){
        if(!str_contains(url()->current(), 'bpanel') and !str_contains(url()->current(), 'livewire')){
            $generalConfiguration = GeneralConfigurationModel::first();
            $generalConfiguration->images = ContentMultimediaFacade::retrieveContentImages('general-configuration', $generalConfiguration->content->id);
            $view->with('generalConfiguration', $generalConfiguration);
        }
    }
}
