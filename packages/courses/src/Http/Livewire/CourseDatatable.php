<?php

namespace Bittacora\Courses\Http\Livewire;

use Bittacora\Courses\Models\CourseModel;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CourseDatatable extends DataTableComponent
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
        $this->setDefaultReorderSort('order_column', 'asc');
        $this->setReorderMethod('changeOrder');
        $this->setReorderEnabled();
    }

    public function columns(): array
    {
        if (config('bpanel4-courses.activate_inscriptions')){
            return [
                Column::make('Título', 'title')->sortable()->searchable(),
                Column::make('Activo', 'active')->view('courses::datatable.active-column'),
                Column::make('Inscripciones', 'inscription')->view('courses::datatable.inscription-column'),
                Column::make('Acciones', 'id')->view('courses::datatable.actions-column')
            ];
        }else{
            return [
                Column::make('Título', 'title')->sortable()->searchable(),
                Column::make('Activo', 'active')->view('courses::datatable.active-column'),
                Column::make('Acciones', 'id')->view('courses::datatable.actions-column')
            ];
        }
    }

    public function builder(): Builder
    {
        return CourseModel::query()
            ->
            when($this->getAppliedFilterWithValue('search'), fn ($query, $term) => $query->where('title', 'like', '%'.strtoupper($term).'%')
                ->orWhere('title', 'like', '%'.strtolower($term).'%')->orWhere('title', 'like', '%'.ucfirst($term).'%'))->orderBy('order_column', 'ASC');
    }

    public function changeOrder($items): void
    {
        foreach ($items as $item) {
            CourseModel::where('id', $item['value'])->update(['order_column' => $item['order']]);
        }
    }

    public function bulkActions(): array{
        return [
            'bulkDelete' => 'Eliminar'
        ];
    }

   /* public function bulkDelete(){
        foreach($this->getSelected() as $key){
            if (config('bpanel4-courses.activate_inscriptions') && method_exists(CourseModel::class,'inscriptions')){
                $canDelete = CourseModel::where('id', $key)->first();
                if ($canDelete->inscriptions->count() > 0){
                    session()->flash('alert-danger', 'Algunos cursos no pueden ser eliminados debido a restricciones');
                    return;
                }
            }
            CourseModel::destroy($key);
        }
        $this->clearSelected();
    }*/

    public function bulkDelete()
    {
        foreach ($this->getSelected() as $key) {
            $curso = CourseModel::find($key);

            // Si las inscripciones están activadas y existe la relación
            if (config('bpanel4-courses.activate_inscriptions') && class_exists(\Bittacora\CourseInscriptions\Models\CourseInscriptionModel::class)) {
                if ($curso->inscriptions()->exists()) {
                    session()->flash('alert-danger', 'Algunos cursos no pueden ser eliminados debido a restricciones');
                    return;
                }
            }

            $curso->delete();
        }

        $this->clearSelected();
    }

}
