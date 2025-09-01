<?php

namespace Bittacora\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Bittacora\Contact\Http\Requests\SendContactRequest;
use Bittacora\Contact\Http\Requests\UpdateContactRequest;
use Bittacora\Contact\Mail\ContactMail;
use Bittacora\Contact\Models\ContactModel;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\GeneralConfiguration\Models\GeneralConfigurationModel;
use Bittacora\Language\LanguageFacade;
use Bittacora\LegalText\Models\LegalText;
use Bittacora\Multimedia\Models\Multimedia;
use Bittacora\Pages\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->allowedFormats = Multimedia::$allowedFormats;
        $this->allowedExtensions = Multimedia::$allowedExtensions;

        View::share(['allowedFormats' => $this->allowedFormats, 'allowedExtensions' => $this->allowedExtensions]);
    }

    public function index($language = null){
        $this->authorize('contact.index');
        if(!ContactModel::first()){
            $model = new ContactModel();
            $configuration = new GeneralConfigurationModel();
            $model->meta_title=$configuration->meta_title;
            $model->meta_description=$configuration->meta_description;
            $model->meta_keywords=$configuration->meta_keywords;
            $model->save();
            ContentFacade::associateWithModel($model);
        }
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }
        $model = ContactModel::first();
        $model->setLocale($language);
        return view('contact::index', compact('model', 'language'));
    }

    public function update(UpdateContactRequest $request, ContactModel $model){
        $this->authorize('contact.update');
        $model->setLocale($request->input('locale'));
        $model->fill($request->validated());
        $model->setMetas($request,$model);
        $model->fill([
            'slug' => 'contacto',
        ]);
        $model->save();

        ContentFacade::associateWithModel($model);

        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('contact.index')->with(['alert-success' => 'La página de presupuestos ha sido actualizado']);
    }

    /**
     * Ficha pública de la página de contacto
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function main()
    {
        $model= ContactModel::where('slug->'.Session::get('locale'), 'contacto')->firstOrfail();
        $model->images = ContentMultimediaFacade::retrieveContentImages('contact', $model->content->id);
        //acceder a la página de política de privacidad
        $lopd=LegalText::where('id','3')->firstOrFail();
        if(Session::exists('response')){
            View::share('response', Session::get('response'));
            Session::remove('response');
        }
        return view('contact',compact('model','lopd'));
    }

    public function sendMail(SendContactRequest $request)
    {
        $params=$request->validated();
        $configuration=GeneralConfigurationModel::first();
        if (!Mail::to($configuration->reception_email)->send(new ContactMail($params))){
            $response = ['status' => 'error', 'message' => 'Su mensaje no pudo ser enviado'];
        } else {
            $response = ['status' => 'success', 'message' => 'Su mensaje se ha enviado correctamente'];
        }
        return redirect()->route('contact',app()->getLocale())->with('response', $response);
    }
}
