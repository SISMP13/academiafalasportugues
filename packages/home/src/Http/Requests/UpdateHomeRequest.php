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
            // Bloque central
            'title_bloque_1' => 'nullable|string',
            'text_bloque_1' => 'nullable|string',
            'text_bloque_2' => 'nullable|string',
            'text_btn1' => 'nullable|string',
            'url_btn1' => 'nullable|string',

            // Destacados
            'title4' => 'nullable|string',
            'title_bloque_2' => 'nullable|string',
            'text_bloque_3' => 'nullable|string',

            'title_bloque_3' => 'nullable|string',
            'title_bloque_4' => 'nullable|string',
            'text_bloque_4' => 'nullable|string',
        ];
    }
}
