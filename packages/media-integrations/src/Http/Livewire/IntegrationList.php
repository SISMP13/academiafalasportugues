<?php

namespace Bittacora\MediaIntegrations\Http\Livewire;

use Bittacora\MediaIntegrations\Models\MediaIntegration;
use Livewire\Component;

class IntegrationList extends Component
{
    public $class;
    public $idClass;
    public $editingIntegration = null;

    public $title;
    public $type;
    public $url;

    protected $listeners = ['integrationSaved' => '$refresh'];

    protected $rules = [
        'title' => 'required|string|max:255',
        'type' => 'required|string|in:youtube,vimeo,tiktok,instagram,facebook,x',
        'url' => 'required',
    ];

    public function edit($id)
    {
        $integration = MediaIntegration::findOrFail($id);

        $this->editingIntegration = $integration;
        $this->title = $integration->title;
        $this->type = $integration->type;
        $this->url = $integration->url;

        $this->dispatchBrowserEvent('show-edit-modal');
    }

    public function update()
    {
        $this->validate();

        if ($this->editingIntegration) {
            $this->editingIntegration->update([
                'title' => $this->title,
                'type' => $this->type,
                'url' => $this->url,
            ]);

            session()->flash('message', 'Integración actualizada correctamente.');
        }

        $this->dispatchBrowserEvent('hide-edit-modal');
    }

    public function delete($id)
    {
        MediaIntegration::where('id', $id)
            ->where('integratable_type', $this->class)
            ->where('integratable_id', $this->idClass)
            ->delete();
    }

    public function render()
    {
        $integrations = MediaIntegration::where('integratable_type', $this->class)
            ->where('integratable_id', $this->idClass)
            ->orderBy('order_column')
            ->get();

        return view('media-integrations::livewire.integration-list', compact('integrations'));
    }

    public function moveUp($id)
    {
        $current = MediaIntegration::findOrFail($id);

        $previous = MediaIntegration::where('integratable_type', $this->class)
            ->where('integratable_id', $this->idClass)
            ->where('order_column', '<', $current->order_column)
            ->orderBy('order_column', 'desc')
            ->first();

        if ($previous) {
            $this->swapOrder($current, $previous);
        }
    }

    public function moveDown($id)
    {
        $current = MediaIntegration::findOrFail($id);

        $next = MediaIntegration::where('integratable_type', $this->class)
            ->where('integratable_id', $this->idClass)
            ->where('order_column', '>', $current->order_column)
            ->orderBy('order_column')
            ->first();

        if ($next) {
            $this->swapOrder($current, $next);
        }
    }

    protected function swapOrder($current, $b)
    {
        $temp = $current->order_column;
        $current->order_column = $b->order_column;
        $b->order_column = $temp;

        $current->save();
        $b->save();
    }

}
