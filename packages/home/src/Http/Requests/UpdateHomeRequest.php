<?php

namespace Bittacora\Home\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('home.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable',
            'text' => 'nullable',
            'text_btn' => 'nullable',
            'url_btn' => 'nullable',
            'text_btn2' => 'nullable',
            'url_btn2' => 'nullable',
            'title2' => 'nullable',
            'text2' => 'nullable',
            'title3' => 'nullable',
            'text3' => 'nullable',
            'title4' => 'nullable',
            'text4' => 'nullable',
        ];
    }
}
