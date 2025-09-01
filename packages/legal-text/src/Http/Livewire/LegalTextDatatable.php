<?php

namespace Bittacora\LegalText\Http\Livewire;

use Bittacora\LegalText\Models\LegalText;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class LegalTextDatatable extends DataTableComponent
{
    use LivewireAlert;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTheadAttributes([
                'style' => 'text-align:center'
            ])
            ->setBulkActionsEnabled()
            ->setHideBulkActionsWhenEmptyStatus(true);
    }

    public function columns(): array
    {
        return [
            Column::make('Título', 'title')->sortable()->searchable(),
            Column::make('Activo', 'active')->view('legal-text::datatable.active-column'),
            Column::make('Acciones', 'id')->view('legal-text::datatable.actions-column')
        ];
    }

    public function builder(): Builder
    {
        return LegalText::query()
            ->
            when($this->getAppliedFilterWithValue('search'), fn ($query, $term) => $query->where('title', 'like', '%'.strtoupper($term).'%')
                ->orWhere('title', 'like', '%'.strtolower($term).'%')->orWhere('title', 'like', '%'.ucfirst($term).'%'));
    }

    public function bulkActions(): array{
        return [
            'bulkDelete' => 'Eliminar'
        ];
    }

    public function bulkDelete(){
        foreach($this->getSelected() as $key){
            LegalText::destroy($key);
        }

        $this->clearSelected();
    }
}
