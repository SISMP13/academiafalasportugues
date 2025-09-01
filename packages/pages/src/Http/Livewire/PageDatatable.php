<?php

namespace Bittacora\Pages\Http\Livewire;

use Bittacora\Pages\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PageDatatable extends DataTableComponent
{

    use LivewireAlert;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTheadAttributes([
                'style' => 'text-align:center'
            ])
            ->setTbodyAttributes([
                'style' => 'text-align:center'
            ])
            ->setThAttributes(function (Column $column) {
                if ($column->isField('title')){
                    return [
                        'default' => true,
                        'class' => 'd-flex justify-content-center'
                    ];
                }
                return [];
            })
            ->setBulkActionsEnabled()
            ->setHideBulkActionsWhenEmptyStatus(true);
    }

    public function columns(): array
    {
        return [
            Column::make('Título', 'title')->sortable()->searchable(),
            Column::make('Activo', 'active')->view('pages::datatable.active-column'),
            Column::make('Acciones', 'id')->view('pages::datatable.actions-column')
        ];
    }

    public function builder(): Builder
    {
        return Page::query()
            ->
            when($this->getAppliedFilterWithValue('search'), fn ($query, $term) => $query->where('title', 'like', '%'.strtoupper($term).'%')
                ->orWhere('title', 'like', '%'.strtolower($term).'%')->orWhere('title', 'like', '%'.ucfirst($term).'%'));;
    }

    public function bulkActions(): array{
        return [
            'bulkDelete' => 'Eliminar'
        ];
    }

    public function bulkDelete(){
        foreach($this->getSelected() as $key){
            Page::destroy($key);
        }

        $this->clearSelected();
    }
}
