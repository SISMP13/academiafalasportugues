<?php
/*
namespace Bittacora\CourseInscriptions\Http\Controllers;

use App\Http\Controllers\Controller;

class CourseInscriptionsController extends Controller
{
    public function index(){
        $this->authorize('courses.course-inscriptions.index');
        return view('course-inscriptions::index');
    }
}*/


namespace Bittacora\CourseInscriptions\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bittacora\CourseInscriptions\Http\Requests\UpdateCourseInscriptionRequest;
use Bittacora\CourseInscriptions\Models\CourseInscriptionModel;
use Bittacora\Courses\Models\CourseModel;
use Illuminate\Support\Facades\Session;

class CourseInscriptionsController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('courses.course-inscriptions.index');

        // filtros
        $search = $request->get('search');
        $courseId = $request->get('course_id');

        // consulta de inscripciones
        $query = CourseInscriptionModel::with('course')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when($courseId, function ($q) use ($courseId) {
                $q->where('course_id', $courseId);
            })
            ->orderBy('created_at', 'desc');

        $inscriptions = $query->paginate(10);

        // lista de cursos para el filtro
        $courses = CourseModel::all()->mapWithKeys(fn($c) => [
            $c->id => $c->getTranslation('title', app()->getLocale(), true)
        ]);

        // pasar datos a la vista
        return view('course-inscriptions::index', compact('inscriptions', 'courses', 'search', 'courseId'));
    }

    public function edit(CourseInscriptionModel $model)
    {
        $this->authorize('courses.course-inscriptions.edit');

        $model->load('course');

        return view('course-inscriptions::edit', compact('model'));
    }

    public function update(UpdateCourseInscriptionRequest $request, CourseInscriptionModel $model)
    {
        $this->authorize('courses.course-inscriptions.update');

        $model->fill($request->validated())->save();

        return redirect()->route('courses.course-inscriptions.edit', $model)
            ->with(['alert-success' => 'La inscripción ha sido actualizada']);
    }

    public function destroy(CourseInscriptionModel $model)
    {
        $this->authorize('courses.course-inscriptions.destroy');

        if ($model->delete()) {
            Session::put('alert-success', 'Inscripción eliminada');
        } else {
            Session::put('alert-danger', 'La inscripción no pudo ser eliminada');
        }

        return redirect()->route('courses.course-inscriptions.index');
    }
}
