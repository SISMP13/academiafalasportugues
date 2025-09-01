<?php

namespace Bittacora\CourseInscriptions\Http\Livewire;

use Bittacora\CourseInscriptions\Models\CourseInscriptionModel;
use Bittacora\Courses\Models\CourseModel;
use Livewire\Component;
use Livewire\WithPagination;

class CourseInscriptionsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCourse = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedCourse()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = CourseInscriptionModel::with('course')
            ->when($this->search, function ($q) {
                $q->where(function ($sub) {
                    $sub->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedCourse, function ($q) {
                $q->where('course_id', $this->selectedCourse);
            })
            ->orderBy('created_at', 'desc');

        $inscriptions = $query->paginate(10);

        $courses = CourseModel::all()->mapWithKeys(fn ($course) => [
            $course->id => $course->getTranslation('title', app()->getLocale(), true),
        ]);

        return view('course-inscriptions::livewire.inscriptions-table', [
            'inscriptions' => $inscriptions,
            'courses' => $courses,
        ]);
    }
}
