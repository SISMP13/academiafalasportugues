<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseInscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('course_inscriptions', 'email')
                    ->where(fn ($query) => $query->where('course_id', $this->route('id'))),
            ],
            'phone' => 'nullable',
            'message' => 'nullable',
            'captcha' => 'required|captcha',
            'policies' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe introducir un nombre',
            'email.required' => 'Debe introducir un correo electrónico',
            'email.email' => 'Debe introducir un correo electrónico válido',
            'email.unique' => 'Ya existe una inscripción con este correo para este curso',
            'captcha.required' => 'El captcha es obligatorio',
            'captcha.captcha' => 'El captcha introducido debe coincidir con la imagen',
            'policies.required' => 'Debe aceptar este campo',
        ];
    }
}
