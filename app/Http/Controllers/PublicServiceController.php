<?php

namespace App\Http\Controllers;

use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\Services\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublicServiceController extends Controller
{
    public function main($slug)
    {
        $model=Service::where('slug->'.Session::get('locale'),$slug)->where('active',1)->first();
        if (!$model){
            $model=Service::where('slug->es',$slug)->where('active',1)->firstOrFail();
        }
        $model->images=ContentMultimediaFacade::retrieveContentImages('services',$model->content->id);
        return view('service-details',compact('model'));
    }
}
