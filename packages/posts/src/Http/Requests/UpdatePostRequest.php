<?php

namespace Bittacora\Posts\Http\Requests;

use Bittacora\Seo\SeoFacade;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     */
    public function authorize(): bool
    {
        return auth()->user()->can('posts.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required',
            'date' => 'nullable',
            /*'short_text' => 'nullable',
            'title_2' => 'nullable',*/
            'long_text' => 'nullable',
            /*'title_3' => 'nullable',
            'long_text_2' => 'nullable',
            'breadcrumb' => 'nullable',*/
            'active' => 'required',
        ];

        $rules = SeoFacade::addRequestValidationRules($rules, 'posts', $this->id);

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Debe introducir un título'
        ];
    }
}
