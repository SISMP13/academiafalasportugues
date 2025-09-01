<?php

namespace Bittacora\CourseInscriptions\Http\Livewire;

use Bittacora\CourseInscriptions\Models\CourseInscriptionModel;
use Bittacora\Courses\Models\CourseModel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class CourseInscriptionsDatatable extends DataTableComponent
{
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
            Column::make('Nombre completo', 'name')->sortable()->searchable(),
            Column::make('Correo electrónico', 'email')->sortable()->searchable(),
            Column::make('Teléfono', 'phone'),
            Column::make('Mensaje', 'message'),

        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Cursos')
                ->options(
                    ['' => 'Selecciona un curso...']
                    + CourseModel::all()
                        ->mapWithKeys(fn ($course) => [
                            $course->id => $course->getTranslation('title', app()->getLocale())
                        ])
                        ->toArray()
                )
                ->filter(function (Builder $builder, $value) {
                    if (!empty($value)) {
                        $builder->where('course_id', $value);
                    }
                }),
        ];
    }

    public function builder(): Builder
    {
        return CourseInscriptionModel::query()
            ->with('course') // 👈 carga el curso de cada inscripción de golpe
            ->when($this->getAppliedFilterWithValue('search'), function ($query, $term) {
                $query->where(function ($q) use ($term) {
                    $q->where('name', 'like', "%{$term}%")
                        ->orWhere('email', 'like', "%{$term}%");
                });
            })
            ->orderBy('created_at', 'DESC');
    }
}
