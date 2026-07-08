<?php

namespace Bittacora\CourseInscriptions\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseInscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('courses.course-inscriptions.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'message' => 'nullable|string',
        ];
    }
}
