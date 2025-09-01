<?php

namespace Bittacora\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Bittacora\Bpanel4\ProductBrands\Models\ProductBrand;
use Bittacora\Bpanel4\Products\Models\Product;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\ContentMultimediaDocuments\Models\ContentMultimediaDocumentsModel;
use Bittacora\ContentMultimediaImages\Models\ContentMultimediaImagesModel;
use Bittacora\ContentMultimediaVideo\Models\ContentMultimediaVideoModel;
use Bittacora\Home\Models\Home;
use Bittacora\Home\Http\Requests\UpdateHomeRequest;
use Bittacora\Language\LanguageFacade;
use Bittacora\Multimedia\Models\Multimedia;
use Bittacora\Posts\Models\Post;
use Bittacora\Services\Models\Service;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
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

    /**
     * Formulario para editar la portado
     *
     * @param Home $model
     * @param $language
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index($language = null)
    {
        $this->authorize('home.index');
        if(!Home::first()){
            $model = new Home();
            $model->save();

            ContentFacade::associateWithModel($model);
        }
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }
        $model = Home::first();
        $model->setLocale($language);

        return view('home::index', compact('model', 'language'));
    }

    /**
     * Actualizar datos de la portada
     *
     * @param UpdateHomeRequest $request
     * @param Home $model
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateHomeRequest $request, Home $model)
    {
        $this->authorize('home.update');
        $model->setLocale($request->input('locale'));
        $model->fill($request->all())->save();

        ContentFacade::associateWithModel($model);

        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('home.index')->with(['alert-success' => 'La portada ha sido actualizada']);
    }

    public function main()
    {
        $model = Home::findOrfail(1);
        $model->images = ContentMultimediaFacade::retrieveContentImages('home', $model->content->id);
        $model->videos = $this->retrieveContentVideos($model->content->id);
        return view('home', compact('model'));
    }

    /*public function isMultimediaAssociatedToContent($contentId, $multimediaId, $type)
    {
        if ($type == 'images') {
            $result = ContentMultimediaImagesModel::where('content_id', $contentId)->where('multimedia_id', $multimediaId)->count();
        } elseif ($type == 'documents') {
            $result = ContentMultimediaDocumentsModel::where('content_id', $contentId)->where('multimedia_id', $multimediaId)->count();
        } elseif ($type == 'videos') {
            $result = ContentMultimediaVideoModel::where('content_id', $contentId)->where('multimedia_id', $multimediaId)->count();
        }

        return (bool)$result;
    }*/

    public function thereIsMultimediaAssociatedToContent($contentId, $type)
    {
        if ($type == 'images') {
            $countContentMultimediaImages = ContentMultimediaImagesModel::where([
                ['content_id', "=", $contentId],
            ])->count();
            return $countContentMultimediaImages;
        } elseif ($type == 'documents') {
            $countContentMultimediaDocuments = ContentMultimediaDocumentsModel::where([
                ['content_id', "=", $contentId],
            ])->count();
            return $countContentMultimediaDocuments;
        } elseif ($type == 'videos') {
            $countContentMultimediaVideos = ContentMultimediaVideoModel::where([
                ['content_id', "=", $contentId],
            ])->count();
            return $countContentMultimediaVideos;
        }
    }

    public function retrieveContentVideos($contentId)
    {
        $moduleVideos = [];
        if ($this->thereIsMultimediaAssociatedToContent($contentId, 'videos')) {
            $moduleVideos = ContentMultimediaVideoModel::where('content_id', $contentId)->where('active', 1)->orderBy('order_column', 'ASC')->with('multimedia')->get();
        }
        return $moduleVideos;
    }
}
