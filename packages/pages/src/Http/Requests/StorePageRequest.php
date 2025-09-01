<?php

namespace Bittacora\Pages\Http\Requests;

use Bittacora\Seo\SeoFacade;
use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
        return auth()->user()->can('pages.store');
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
            'text' => 'nullable',
            'subtitle' => 'nullable',
            'title_2' => 'nullable',
            'long_text' => 'nullable',
            'title_3' => 'nullable',
            'long_text_2' => 'nullable',
            'title_4' => 'nullable',
            'long_text_3' => 'nullable',
            'text2' => 'nullable',
            'breadcrumb' => 'nullable',
            'active' => 'required'
        ];

        $rules = SeoFacade::addRequestValidationRules($rules, 'pages');

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Debe introducir un título'
        ];
    }
}
