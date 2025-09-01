<?php

namespace Bittacora\Services\Http\Controllers;

use App\Helpers\ServiceHelper;
use App\Http\Controllers\Controller;
use Bittacora\Category\CategoryFacade;
use Bittacora\Category\Models\CategorizableModel;
use Bittacora\Category\Traits\CategoryController;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\Language\LanguageFacade;
use Bittacora\Multimedia\Models\Multimedia;
use Bittacora\Multimedia\MultimediaFacade;
use Bittacora\Services\Http\Requests\StoreServiceRequest;
use Bittacora\Services\Http\Requests\UpdateServiceRequest;
use Bittacora\Services\Models\Service;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ServiceController extends Controller
{
    use CategoryController;

    public function __construct()
    {
        if (config('bpanel4-services.categories')){
            $this->setCategoryControllerProperties(Service::class);
        }
        $allowedFormats = Multimedia::$allowedFormats;
        $allowedExtensions = Multimedia::$allowedExtensions;

        View::share([
            'allowedFormats' => $allowedFormats,
            'allowedExtensions' => $allowedExtensions
        ]);
    }

    public function index(){
        $this->authorize('services.index');
        return view('services::index');
    }

    public function create($language = null){
        $this->authorize('services.create');

        if(empty($language)){
            $defaultLanguage = LanguageFacade::getDefault();
            $language = $defaultLanguage->locale;
        }

        if (config('bpanel4-services.categories')){
            $categories = CategoryFacade::getAllAsArray(Service::class);
            return view('services::create', ['language' => $language, 'categories' => $categories]);
        }

        return view('services::create', ['language' => $language]);
    }

    public function store(StoreServiceRequest $request){
        $this->authorize('services.store');

        $model = new Service();
        $model->setLocale($request->input('locale'));
        if (config('bpanel4-services.categories')){
            $model->fill($request->except('category'));
        }else{
            $model->fill($request->all());
        }
        $model->setMetas($request,$model);
        $model->save();

        if(!$model){
            return redirect()->route('services.create')->with(['alert-danger' => config('bpanel4-services.alert-store-danger')]);
        }

        if (config('bpanel4-services.categories')){
            CategoryFacade::associateToModel($model, $request->input('category'));
        }

        ContentFacade::associateWithModel($model);

        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('services.edit', compact('model'))->with(['alert-success' => config('bpanel4-services.alert-store-success')]);
    }

    public function edit(Service $model, $language = null)
    {
        $this->authorize('services.edit');
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }
        $model->setLocale($language);

        if (config('bpanel4-services.categories')){
            $categories = CategoryFacade::getAllAsArray(Service::class);
            return view('services::edit', ['language' => $language, 'model' => $model, 'multimedia' => MultimediaFacade::getAll(), 'categories' => $categories]);
        }

        return view('services::edit', ['language' => $language, 'model' => $model, 'multimedia' => MultimediaFacade::getAll()]);
    }

    public function update(UpdateServiceRequest $request, Service $model)
    {
        $this->authorize('services.update');
        $model->setLocale($request->input('locale'));

        if (config('bpanel4-services.categories')){
            $model->fill($request->except('category'));
        }else{
            $model->fill($request->all());
        }
        $model->setMetas($request,$model);
        if(!$model->save()){
            return redirect()->route('services.edit', compact('model'))->with(['alert-danger' => config('bpanel4-services.alert-update-danger')]);
        }

        if (config('bpanel4-services.categories')){
            CategoryFacade::associateToModel($model, $request->input('category'));
        }

        ContentFacade::associateWithModel($model);
        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('services.edit', compact('model'))->with(['alert-success' => config('bpanel4-services.alert-update-success')]);
    }

    public function destroy(Service $model)
    {
        $this->authorize('services.destroy');

        if (config('bpanel4-services.categories')){
            CategoryFacade::deleteModelCategorizable($model);
            if (!is_null($model->categorizable) && $model->categorizable->count() > 0) {
                $idsCategorizable = CategorizableModel::where('category_id', $model->categorizable->category->getId())
                    ->ordered()->pluck('categorizable_id');
                CategorizableModel::setNewOrder($idsCategorizable, 1, 'categorizable_id');
            }
        }

        if ($model->delete()) {
            ContentFacade::deleteModelContent($model);
            Session::put('alert-success', config('bpanel4-services.alert-destroy-success'));
        } else {
            Session::put('alert-danger', config('bpanel4-services.alert-destroy-danger'));
        }
        return redirect(route('services.index'));
    }
}
