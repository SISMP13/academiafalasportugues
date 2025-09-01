<?php

namespace Bittacora\Posts\Http\Livewire;

use Bittacora\Posts\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PostDatatable extends DataTableComponent
{

    /**
     * @inheritDoc
     */
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTheadAttributes([
                'style' => 'text-align:center'
            ])
            ->setTbodyAttributes([
                'style' => 'text-align:center'
            ])
            ->setBulkActionsEnabled()
            ->setHideBulkActionsWhenEmptyStatus(true);
    }

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            Column::make('Fecha', 'date')->format(fn($value,$row, Column $column) => date('d/m/Y', strtotime($row->date))),
            Column::make('Título', 'title')->sortable()->searchable(),
            Column::make('Activo', 'active')->view('posts::datatable.active-column'),
            Column::make('Acciones', 'id')->view('posts::datatable.actions-column')
        ];
    }

    public function builder(): Builder
    {
        return Post::query()
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
            Post::destroy($key);
        }

        $this->clearSelected();
    }
}
