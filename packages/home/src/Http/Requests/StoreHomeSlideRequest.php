<?php

namespace Bittacora\Home\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeSlideRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->request->add(['active' => $this->has('active') ? 1 : 0]);
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('home-slides.store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'text' => 'nullable|string',
            'text_btn' => 'nullable|string',
            'url_btn' => 'nullable|string',
            'text_btn2' => 'nullable|string',
            'url_btn2' => 'nullable|string',
            'active' => 'required',
        ];
    }
}
