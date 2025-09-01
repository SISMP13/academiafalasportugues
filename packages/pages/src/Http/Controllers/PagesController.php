<?php

namespace Bittacora\Pages\Http\Controllers;

use App\Http\Controllers\Controller;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\GeneralConfiguration\Models\GeneralConfigurationModel;
use Bittacora\Language\LanguageFacade;
use Bittacora\Multimedia\Models\Multimedia;
use Bittacora\Multimedia\MultimediaFacade;
use Bittacora\Pages\Http\Mail\PreOrderMail;
use Bittacora\Pages\Http\Requests\SendPreOrderRequest;
use Bittacora\Pages\Http\Requests\StorePageRequest;
use Bittacora\Pages\Http\Requests\UpdatePageRequest;
use Bittacora\Pages\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class PagesController extends Controller
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
        $this->authorize('pages.index');
        return view('pages::index');
    }

    public function create($language = null){
        $this->authorize('pages.create');

        if(empty($language)){
            $defaultLanguage = LanguageFacade::getDefault();
            $language = $defaultLanguage->locale;
        }

        return view('pages::create', ['language' => $language]);
    }

    public function store(StorePageRequest $request){
        $this->authorize('pages.store');

        $model = new Page();
        $model->setLocale($request->input('locale'));
        $model->fill($request->all());
        $model->setMetas($request,$model);
        $model->save();

        if(!$model){
            return redirect()->route('pages.create')->with(['alert-danger' => 'Hubo un error al crear la página.']);
        }

        ContentFacade::associateWithModel($model);

        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('pages.edit', compact('model'))->with(['alert-success' => 'La página ha sido creada correctamente.']);
    }

    public function edit(Page $model, $language = null)
    {
        $this->authorize('pages.edit');
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }

        $model->setLocale($language);
        return view('pages::edit', ['language' => $language, 'model' => $model, 'multimedia' => MultimediaFacade::getAll()]);
    }

    public function update(UpdatePageRequest $request, Page $model)
    {
        $this->authorize('pages.update');
        $model->setLocale($request->input('locale'));

        $model->fill($request->all());

        $model->setMetas($request,$model);

        if(!$model->save()){
            return redirect()->route('pages.edit', compact('model'))->with(['alert-danger' => 'La página no pudo ser actualizada']);
        }

        ContentFacade::associateWithModel($model);
        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('pages.edit', compact('model'))->with(['alert-success' => 'La página ha sido actualizada']);
    }

    public function destroy(Page $model)
    {
        $this->authorize('pages.destroy');

        if ($model->delete()) {
            ContentFacade::deleteModelContent($model);
            Session::put('alert-success', 'Página eliminada');
        } else {
            Session::put('alert-danger', 'La página no pudo ser eliminada');
        }
        return redirect(route('pages.index'));
    }

    /**
     * Ficha pública de la página
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function main($slug)
    {
        $model=Page::where('slug->'.Session::get('locale'),$slug)->where('active',1)->with('content')->firstOrFail();
        $model->images=ContentMultimediaFacade::retrieveContentImages('pages',$model->content->id);
        return view('page',compact('model'));
    }

    /**
     * Ficha pública de la página (vista previa)
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function preview($slug)
    {
        $model=Page::where('slug->'.Session::get('locale'),$slug)->where('active',0)->with('content')->firstOrFail();
        $model->images=ContentMultimediaFacade::retrieveContentImages('pages',$model->content->id);
        return view('page',compact('model'));
    }


}
