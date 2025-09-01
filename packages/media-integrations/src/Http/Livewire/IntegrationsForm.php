<?php

namespace Bittacora\MediaIntegrations\Http\Livewire;

use Bittacora\MediaIntegrations\Models\MediaIntegration;
use Livewire\Component;

class IntegrationsForm extends Component
{
    public $title = '';
    public $type = 'youtube';
    public $url = '';
    public $class;
    public $idClass;

    protected $rules = [
        'title' => 'required|string|max:255',
        'type' => 'required|string|in:youtube,vimeo,tiktok,instagram,facebook,x',
        'url' => 'required',
    ];

    public function save()
    {
        $this->validate();

        MediaIntegration::create([
            'title' => $this->title,
            'type' => $this->type,
            'url' => $this->url,
            'integratable_type' => $this->class,
            'integratable_id' => $this->idClass,
        ]);

        $this->reset(['title', 'type', 'url']);
        $this->emit('integrationSaved');
        session()->flash('message', 'Integración guardada exitosamente!');
    }

    public function render()
    {
        return view('media-integrations::livewire.integrations-form');
    }
}
