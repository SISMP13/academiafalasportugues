<?php

namespace Bittacora\Courses\Http\Requests;

use Bittacora\Seo\SeoFacade;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        if($this->has('active')){
            $this->request->add(['active' => 1]);
        }else{
            $this->request->add(['active' => 0]);
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('courses.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'text_info' => 'nullable',
            'text' => 'nullable',
        ];

        $rules = SeoFacade::addRequestValidationRules($rules, 'courses', $this->id);

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Debe introducir un título'
        ];
    }
}
