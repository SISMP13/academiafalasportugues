<?php

namespace Bittacora\LegalText\Http\Controllers;

use App\Http\Controllers\Controller;
//use Bittacora\Content\ContentFacade;
//use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\Language\LanguageFacade;
use Bittacora\LegalText\Http\Requests\StoreLegalTextRequest;
use Bittacora\LegalText\Http\Requests\UpdateLegalTextRequest;
use Bittacora\LegalText\Models\LegalText;
//use Bittacora\Multimedia\Models\Multimedia;
//use Bittacora\Multimedia\MultimediaFacade;
use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\View;

class LegalTextController extends Controller
{
    /*public function __construct()
    {
        $allowedFormats = Multimedia::$allowedFormats;
        $allowedExtensions = Multimedia::$allowedExtensions;

        View::share([
            'allowedFormats' => $allowedFormats,
            'allowedExtensions' => $allowedExtensions
        ]);
    }*/

    public function index(){
        $this->authorize('legal-text.index');
        return view('legal-text::index');
    }

    public function create($language = null){
        $this->authorize('legal-text.create');

        if(empty($language)){
            $defaultLanguage = LanguageFacade::getDefault();
            $language = $defaultLanguage->locale;
        }

        return view('legal-text::create', ['language' => $language]);
    }

    public function store(StoreLegalTextRequest $request){
        $this->authorize('legal-text.store');

        $model = new LegalText();
        $model->setLocale($request->input('locale'));
        $model->fill($request->all());
        $model->setMetas($request,$model);
        $model->save();

        if(!$model){
            return redirect()->route('legal-text.create')->with(['alert-danger' => 'Hubo un error al crear la página.']);
        }

        /*ContentFacade::associateWithModel($model);

        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }*/

        return redirect()->route('legal-text.edit', compact('model'))->with(['alert-success' => 'La página ha sido creada correctamente.']);
    }

    public function edit(LegalText $model, $language = null)
    {
        $this->authorize('legal-text.edit');
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }

        $model->setLocale($language);
        return view('legal-text::edit', ['language' => $language, 'model' => $model/*, 'multimedia' => MultimediaFacade::getAll()*/]);
    }

    public function update(UpdateLegalTextRequest $request, LegalText $model)
    {
        $this->authorize('legal-text.update');
        $model->setLocale($request->input('locale'));

        $model->fill($request->all());

        $model->setMetas($request,$model);

        if(!$model->save()){
            return redirect()->route('legal-text.edit', compact('model'))->with(['alert-danger' => 'La página no pudo ser actualizada']);
        }

        /*ContentFacade::associateWithModel($model);
        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }*/

        return redirect()->route('legal-text.edit', compact('model'))->with(['alert-success' => 'La página ha sido actualizada']);
    }

    public function destroy(LegalText $model)
    {
        $this->authorize('legal-text.destroy');

        if ($model->delete()) {
            /*ContentFacade::deleteModelContent($model);*/
            Session::put('alert-success', 'Página eliminada');
        } else {
            Session::put('alert-danger', 'La página no pudo ser eliminada');
        }
        return redirect(route('legal-text.index'));
    }

    /**
     * Ficha pública de la página
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function main($slug)
    {
        $model=LegalText::where('slug->'.Session::get('locale'),$slug)->where('active',1)->firstOrFail();
        return view('legal-text',compact('model'));
    }
}
