<?php

namespace Bittacora\GeneralConfiguration\Http\Controllers;

use App\Http\Controllers\Controller;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\GeneralConfiguration\Http\Requests\UpdateGeneralConfigurationRequest;
use Bittacora\GeneralConfiguration\Models\GeneralConfigurationModel;
use Bittacora\Language\LanguageFacade;
use Bittacora\Multimedia\Models\Multimedia;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;

class GeneralConfigurationController extends Controller
{
    public function __construct()
    {
        $this->allowedFormats = Multimedia::$allowedFormats;
        $this->allowedExtensions = Multimedia::$allowedExtensions;

        View::share(['allowedFormats' => $this->allowedFormats, 'allowedExtensions' => $this->allowedExtensions]);
    }

    public function index($language = null){
        $this->authorize('general-configuration.index');
        if(!GeneralConfigurationModel::first()){
            $model = new GeneralConfigurationModel();
            $model->save();

            ContentFacade::associateWithModel($model);
        }
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }
        $model = GeneralConfigurationModel::first();
        $model->setLocale($language);

        Artisan::call('optimize:clear');

        return view('general-configuration::index', compact('model', 'language'));
    }

    public function update(UpdateGeneralConfigurationRequest $request, GeneralConfigurationModel $model){
        $this->authorize('general-configuration.update');
        $model->setLocale($request->input('locale'));
        $model->fill($request->validated())->save();

        ContentFacade::associateWithModel($model);

        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('general-configuration.index')->with(['alert-success' => 'La configuración ha sido actualizada']);
    }
}
