<?php

namespace Bittacora\Services\Http\Requests;

use Bittacora\Seo\SeoFacade;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
        return auth()->user()->can('services.store');
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
            'text_home' => 'nullable',
            'text' => 'nullable',
            'active' => 'required',
        ];

        $rules = SeoFacade::addRequestValidationRules($rules, config('bpanel4-services.table_name'));

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Debe introducir el título',
        ];
    }
}
