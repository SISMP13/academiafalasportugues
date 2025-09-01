<?php

namespace Bittacora\Testimonial\Http\Controllers;

use App\Http\Controllers\Controller;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\Language\LanguageFacade;
use Bittacora\Multimedia\Models\Multimedia;
use Bittacora\Multimedia\MultimediaFacade;
use Bittacora\Testimonial\Http\Requests\StoreTestimonialRequest;
use Bittacora\Testimonial\Http\Requests\UpdateTestimonialRequest;
use Bittacora\Testimonial\Models\Testimonial;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class TestimonialController extends Controller
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

    public function index(){
        $this->authorize('testimonial.index');
        return view('testimonial::index');
    }

    public function create($language = null){
        $this->authorize('testimonial.create');

        if(empty($language)){
            $defaultLanguage = LanguageFacade::getDefault();
            $language = $defaultLanguage->locale;
        }

        return view('testimonial::create', ['language' => $language]);
    }

    public function store(StoreTestimonialRequest $request){
        $this->authorize('testimonial.store');

        $model = new Testimonial();
        $model->setLocale($request->input('locale'));
        $model->fill($request->all());
        $model->save();

        if(!$model){
            return redirect()->route('testimonial.create')->with(['alert-danger' => 'Hubo un error al crear el testimonio.']);
        }

        ContentFacade::associateWithModel($model);

        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('testimonial.edit', compact('model'))->with(['alert-success' => 'El testimonio ha sido creado correctamente.']);
    }

    public function edit(Testimonial $model, $language = null)
    {
        $this->authorize('testimonial.edit');
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }

        $model->setLocale($language);
        return view('testimonial::edit', ['language' => $language, 'model' => $model, 'multimedia' => MultimediaFacade::getAll()]);
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $model)
    {
        $this->authorize('testimonial.update');
        $model->setLocale($request->input('locale'));

        $model->fill($request->all());

        if(!$model->save()){
            return redirect()->route('testimonial.edit', compact('model'))->with(['alert-danger' => 'El testimonio no pudo ser actualizado']);
        }

        ContentFacade::associateWithModel($model);
        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('testimonial.edit', compact('model'))->with(['alert-success' => 'El testimonio ha sido actualizado']);
    }

    public function destroy(Testimonial $model)
    {
        $this->authorize('testimonial.destroy');

        if ($model->delete()) {
            ContentFacade::deleteModelContent($model);
            Session::put('alert-success', 'Testimonio eliminado');
        } else {
            Session::put('alert-danger', 'El testimonio no pudo ser eliminado');
        }
        return redirect(route('testimonial.index'));
    }
}
