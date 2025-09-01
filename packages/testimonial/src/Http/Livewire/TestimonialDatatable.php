<?php

namespace Bittacora\Testimonial\Http\Livewire;

use Bittacora\Testimonial\Models\Testimonial;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TestimonialDatatable extends DataTableComponent
{

    use LivewireAlert;

    public bool $reordering = true;
    public string $reorderingMethod = 'reorder';
    public bool $reorderEnabled = false;
    public bool $showPerPage = false;
    public bool $showPagination = false;
    public array $perPageAccepted = [100];
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
        $this->setDefaultReorderSort('order_column', 'asc');
        $this->setReorderMethod('changeOrder');
        $this->setReorderEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make('Nombre', 'name')->sortable()->searchable(),
            Column::make('Activo', 'active')->view('testimonial::datatable.active-column'),
            Column::make('Orden', 'order_column')->view('testimonial::datatable.order-column'),
            Column::make('Acciones', 'id')->view('testimonial::datatable.actions-column')
        ];
    }

    public function builder(): Builder
    {
        return Testimonial::query()
            ->
            when($this->getAppliedFilterWithValue('search'), fn ($query, $term) => $query->where('title', 'like', '%'.strtoupper($term).'%')
                ->orWhere('title', 'like', '%'.strtolower($term).'%')->orWhere('title', 'like', '%'.ucfirst($term).'%'))->orderBy('order_column', 'ASC');
    }

    public function changeOrder($items): void
    {
        foreach ($items as $item) {
            Testimonial::where('id', $item['value'])->update(['order_column' => $item['order']]);
        }
    }

    public function bulkActions(): array{
        return [
            'bulkDelete' => 'Eliminar'
        ];
    }

    public function bulkDelete(){
        foreach($this->getSelected() as $key){
            Testimonial::destroy($key);
        }

        $this->clearSelected();
    }
}
