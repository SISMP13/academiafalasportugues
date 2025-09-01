<?php

namespace Bittacora\Services\Http\Livewire;

use Bittacora\Services\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ServicesDatatable extends DataTableComponent
{

    use LivewireAlert;

    public bool $reordering = true;
    public string $reorderingMethod = 'reorder';
    public bool $reorderEnabled = false;
    public bool $showPerPage = false;
    public bool $showPagination = false;
    public array $perPageAccepted = [200];
    public bool $selectAll = false;
    public bool $perPageAll = false;
    public bool $paginationEnabled = false;


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTheadAttributes([
                'style' => 'text-align:center'
            ])
            ->setBulkActionsEnabled()
            ->setHideBulkActionsWhenEmptyStatus(true);
        if (config('bpanel4-services.sortable_datatable')){
            $this->setDefaultReorderSort('order_column', 'asc');
            $this->setReorderMethod('changeOrder');
            $this->setReorderEnabled();
        }else{
            $this->setPerPageAccepted([10, 25, 50, 100]);
            $this->setPerPageVisibilityStatus(true);
        }
    }

    public function columns(): array
    {
        if (config('bpanel4-services.sortable_datatable')){
            return [
                Column::make('Título', 'title')->sortable()->searchable(),
                Column::make('Activo', 'active')->view('services::datatable.active-column'),
                Column::make('Orden', 'order_column')->view('services::datatable.order-column'),
                Column::make('Acciones', 'id')->view('services::datatable.actions-column'),
            ];
        }else{
            return [
                Column::make('Título', 'title')->sortable()->searchable(),
                Column::make('Activo', 'active')->view('services::datatable.active-column'),
                Column::make('Acciones', 'id')->view('services::datatable.actions-column')
            ];
        }
    }

    public function builder(): Builder
    {

        if (config('bpanel4-services.sortable_datatable')){
            $query = Service::query()
                ->
                when($this->getAppliedFilterWithValue('search'), fn ($query, $term) => $query->where('title', 'like', '%'.strtoupper($term).'%')
                    ->orWhere('title', 'like', '%'.strtolower($term).'%')->orWhere('title', 'like', '%'.ucfirst($term).'%'))->orderBy('order_column', 'ASC');
        }else{
            $query = Service::query()
                ->
                when($this->getAppliedFilterWithValue('search'), fn ($query, $term) => $query->where('title', 'like', '%'.strtoupper($term).'%')
                    ->orWhere('title', 'like', '%'.strtolower($term).'%')->orWhere('title', 'like', '%'.ucfirst($term).'%'));
        }
        return $query;
    }

    public function changeOrder($items): void
    {
        foreach ($items as $item) {
            Service::where('id', $item['value'])->update(['order_column' => $item['order']]);
        }
    }

    public function bulkActions(): array{
        return [
            'bulkDelete' => 'Eliminar'
        ];
    }

    public function bulkDelete(){
        foreach($this->getSelected() as $key){
            Service::destroy($key);
        }

        $this->clearSelected();
    }
}
