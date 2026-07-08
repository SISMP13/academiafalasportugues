<?php

namespace Bittacora\Courses\Http\Controllers;

use App\Http\Controllers\Controller;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\Courses\Http\Requests\StoreCourseRequest;
use Bittacora\Courses\Http\Requests\UpdateCourseRequest;
use Bittacora\Courses\Models\CourseModel;
use Bittacora\Language\LanguageFacade;
use Bittacora\Multimedia\Models\Multimedia;
use Bittacora\Multimedia\MultimediaFacade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CoursesController extends Controller
{
    public function __construct()
    {
        $allowedFormats = Multimedia::$allowedFormats;
        $allowedExtensions = Multimedia::$allowedExtensions;

        View::share([
            'allowedFormats' => $allowedFormats,
            'allowedExtensions' => $allowedExtensions
        ]);
    }

    public function index()
    {
        $this->authorize('courses.index');
        return view('courses::index');
    }

    public function create($language = null)
    {
        $this->authorize('courses.create');

        if (empty($language)) {
            $defaultLanguage = LanguageFacade::getDefault();
            $language = $defaultLanguage->locale;
        }

        return view('courses::create', ['language' => $language]);
    }

    public function store(StoreCourseRequest $request)
    {
        $this->authorize('courses.store');

        $model = new CourseModel();
        $model->setLocale($request->input('locale'));
        $model->fill($request->all());
        $model->setMetas($request, $model);
        $model->save();

        if (!$model) {
            return redirect()->route('courses.create')->with(['alert-danger' => 'Hubo un error al crear el curso.']);
        }

        ContentFacade::associateWithModel($model);

        if (!is_null($request->file('file'))) {
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('courses.edit', compact('model'))->with(['alert-success' => 'El curso ha sido creado correctamente.']);
    }



    public function edit(CourseModel $model, $language = null)
    {
        $this->authorize('courses.edit');
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }

        $model->setLocale($language);

        // 🔑 Forzar carga de la relación "content"
        $model->load('content');

        $inscriptions = collect();
        if (config('bpanel4-courses.activate_inscriptions')) {
            $inscriptionsRelation = $model->inscriptions();
            if ($inscriptionsRelation) {
                $inscriptions = $inscriptionsRelation->orderBy('created_at', 'desc')->get();
            }
        }

        return view('courses::edit', [
            'language' => $language,
            'model' => $model,
            'multimedia' => MultimediaFacade::getAll(),
            'inscriptions' => $inscriptions,
        ]);
    }






    public function update(UpdateCourseRequest $request, CourseModel $model)
    {
        $this->authorize('courses.update');
        $model->setLocale($request->input('locale'));

        $model->fill($request->all());

        $model->setMetas($request,$model);

        if(!$model->save()){
            return redirect()->route('courses.edit', compact('model'))->with(['alert-danger' => 'El curso no pudo ser actualizado']);
        }

        ContentFacade::associateWithModel($model);
        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('courses.edit', compact('model'))->with(['alert-success' => 'El curso ha sido actualizado']);
    }

    public function destroy(CourseModel $model)
    {
        $this->authorize('courses.destroy');

        if (config('bpanel4-courses.activate_inscriptions') && method_exists($model, 'inscriptions')){
            if ($model->inscriptions()->count() > 0){
                return redirect()->back()->with('alert-danger', 'El curso no pudo ser eliminado debido a que hay inscripciones a este curso');
            }
        }
        if ($model->delete()) {
            ContentFacade::deleteModelContent($model);
            Session::put('alert-success', 'Curso eliminado');
        } else {
            Session::put('alert-danger', 'El curso no pudo ser eliminado');
        }
        return redirect(route('courses.index'));
    }
}
