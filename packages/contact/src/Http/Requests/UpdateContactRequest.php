<?php

namespace Bittacora\Contact\Http\Requests;

use Bittacora\Seo\SeoFacade;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return auth()->user()->can('contact.update');
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
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'zoom' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
            'mobile' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable'
        ];

        $rules = SeoFacade::addRequestValidationRules($rules, 'contact', $this->id);

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Debe introducir un título'
        ];
    }
}
