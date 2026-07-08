<?php

namespace Bittacora\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\Home\Http\Requests\StoreHomeSlideRequest;
use Bittacora\Home\Http\Requests\UpdateHomeSlideRequest;
use Bittacora\Home\Models\HomeSlide;
use Bittacora\Language\LanguageFacade;
use Bittacora\Multimedia\Models\Multimedia;
use Bittacora\Multimedia\MultimediaFacade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class HomeSlideController extends Controller
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
        $this->authorize('home-slides.index');
        return view('home::slides.index');
    }

    public function create($language = null)
    {
        $this->authorize('home-slides.create');

        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }

        return view('home::slides.create', ['language' => $language]);
    }

    public function store(StoreHomeSlideRequest $request)
    {
        $this->authorize('home-slides.store');

        $model = new HomeSlide();
        $model->setLocale($request->input('locale'));
        $model->fill($request->all());
        $model->save();

        if (!$model) {
            return redirect()->route('home-slides.create')->with(['alert-danger' => 'Hubo un error al crear el slide.']);
        }

        ContentFacade::associateWithModel($model);

        if (!is_null($request->file('file'))) {
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('home-slides.edit', compact('model'))->with(['alert-success' => 'El slide ha sido creado correctamente.']);
    }

    public function edit(HomeSlide $model, $language = null)
    {
        $this->authorize('home-slides.edit');
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }

        $model->setLocale($language);
        return view('home::slides.edit', ['language' => $language, 'model' => $model, 'multimedia' => MultimediaFacade::getAll()]);
    }

    public function update(UpdateHomeSlideRequest $request, HomeSlide $model)
    {
        $this->authorize('home-slides.update');
        $model->setLocale($request->input('locale'));

        $model->fill($request->all());

        if (!$model->save()) {
            return redirect()->route('home-slides.edit', compact('model'))->with(['alert-danger' => 'El slide no pudo ser actualizado']);
        }

        ContentFacade::associateWithModel($model);
        if (!is_null($request->file('file'))) {
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('home-slides.edit', compact('model'))->with(['alert-success' => 'El slide ha sido actualizado']);
    }

    public function destroy(HomeSlide $model)
    {
        $this->authorize('home-slides.destroy');

        if ($model->delete()) {
            ContentFacade::deleteModelContent($model);
            Session::put('alert-success', 'Slide eliminado');
        } else {
            Session::put('alert-danger', 'El slide no pudo ser eliminado');
        }
        return redirect(route('home-slides.index'));
    }
}
