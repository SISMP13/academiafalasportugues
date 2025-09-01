<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseInscriptionRequest;
use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\CourseInscriptions\Models\CourseInscriptionModel;
use Bittacora\Courses\Models\CourseModel;
use Bittacora\LegalText\Models\LegalText;

class CoursePublicController extends Controller
{
    /**
     * Página de cursos
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function main()
    {
        $courses = CourseModel::where('active', 1)->orderBy('order_column', 'ASC')->get();
        foreach ($courses as $course){
            $course->images = ContentMultimediaFacade::retrieveContentImages('courses',$course->content->id);
        }
        return view('courses', compact('courses'));
    }

    /**
     * Ficha pública de un curso
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function courseDetails($slug)
    {
        $model=CourseModel::where('slug->'.app()->getLocale(),$slug)->where('active',1)->with('content')->firstOrFail();
        $model->images=ContentMultimediaFacade::retrieveContentImages('courses',$model->content->id);
        $lopd=LegalText::where('id','3')->firstOrFail();
        return view('course-details',compact('model','lopd'));
    }

    /**
     * Enviar la inscripción del curso y almacenarla en base de datos
     *
     * @param CourseInscriptionRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeInscription(CourseInscriptionRequest $request, int $id)
    {
        $course = CourseModel::findOrFail($id);
        $validated = $request->validated();
        $validated['course_id'] = $id;
        unset($validated['captcha'], $validated['policies']);
        if (!CourseInscriptionModel::create($validated)){
            $response = ['status' => 'error', 'message' => __("You were unable to register for the course, please try again later")];
        } else {
            $response = ['status' => 'success', 'message' => __("Your course registration has been successfully submitted")];
        }
        return redirect()->route('course.details', $course->slug)->with('response', $response);
    }
}
