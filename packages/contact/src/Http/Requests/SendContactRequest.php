<?php

namespace Bittacora\Contact\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendContactRequest extends FormRequest
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
            'email' => 'required',
            'phone' => 'nullable',
            'message' => 'required',
            'captcha' => 'required|captcha',
            'policies' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe introducir un nombre',
            'email.required' => 'Debe introducir un correo electrónico',
            'message.required' => 'Debe añadir un mensaje',
            'captcha.required' => 'El captcha es obligatorio',
            'captcha.captcha' => 'El captcha introducido debe coincidir con la imagen',
            'policies.required' => 'Debe aceptar este campo',
        ];
    }
}
