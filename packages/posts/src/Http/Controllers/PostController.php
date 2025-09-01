<?php

namespace Bittacora\Posts\Http\Controllers;

use App\Http\Controllers\Controller;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\ContentMultimediaImages\ContentMultimediaImagesLocationFacade;
use Bittacora\Language\LanguageFacade;
use Bittacora\MediaIntegrations\Facades\MediaIntegrationsFacade;
use Bittacora\Multimedia\Models\Multimedia;
use Bittacora\Multimedia\MultimediaFacade;
use Bittacora\Posts\Http\Requests\StorePostRequest;
use Bittacora\Posts\Http\Requests\UpdatePostRequest;
use Bittacora\Posts\Models\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class PostController extends Controller
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
        $this->authorize('posts.index');
        return view('posts::index');
    }

    public function create($language = null){
        $this->authorize('posts.create');

        if(empty($language)){
            $defaultLanguage = LanguageFacade::getDefault();
            $language = $defaultLanguage->locale;
        }

        return view('posts::create', ['language' => $language]);
    }

    public function store(StorePostRequest $request){
        $this->authorize('posts.store');

        $model = new Post();
        $model->setLocale($request->input('locale'));
        $model->fill($request->all());
        $model->setMetas($request,$model);
        $model->save();

        if(!$model){
            return redirect()->route('posts.create')->with(['alert-danger' => config('bpanel4-posts.alert-store-danger')]);
        }

        ContentFacade::associateWithModel($model);

        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('posts.edit', compact('model'))->with(['alert-success' => config('bpanel4-posts.alert-store-success')]);
    }

    public function edit(Post $model, $language = null)
    {
        $this->authorize('posts.edit');
        if (empty($language)) {
            $language = LanguageFacade::getDefault()->locale;
        }

        $model->setLocale($language);
        return view('posts::edit', ['language' => $language, 'model' => $model, 'multimedia' => MultimediaFacade::getAll()]);
    }

    public function update(UpdatePostRequest $request, Post $model)
    {
        $this->authorize('posts.update');
        $model->setLocale($request->input('locale'));

        $model->fill($request->all());
        $model->setMetas($request,$model);

        if(!$model->save()){
            return redirect()->route('posts.edit', compact('model'))->with(['alert-danger' => config('bpanel4-posts.alert-update-danger')]);
        }

        ContentFacade::associateWithModel($model);
        if(!is_null($request->file('file'))){
            ContentMultimediaFacade::uploadModelMultimedia($model, $request->file('file'));
        }

        return redirect()->route('posts.edit', compact('model'))->with(['alert-success' => config('bpanel4-posts.alert-update-success')]);
    }

    public function destroy(Post $model)
    {
        $this->authorize('posts.destroy');

        if ($model->delete()) {
            ContentFacade::deleteModelContent($model);
            Session::put('alert-success', config('bpanel4-posts.alert-destroy-success'));
        } else {
            Session::put('alert-danger', config('bpanel4-posts.alert-destroy-danger'));
        }
        return redirect(route('posts.index'));
    }

    /**
     * Ficha pública del blog
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function main()
    {
        $posts=Post::where('active',1)->orderBy('date','DESC')->paginate(6);
        foreach ($posts as $post){
            $post->images=ContentMultimediaFacade::retrieveContentImages('posts',$post->content->id);
        }
        return view('posts',compact('posts'));
    }

    public function postDetails($slug)
    {
        $model=Post::where('active',1)->where('slug->'.Session::get('locale'), $slug)->firstOrFail();
        $model->images = ContentMultimediaFacade::retrieveContentImages('posts', $model->content->id);
        //integraciones multimedia

        return view('post-details',compact('model'));
    }
}
