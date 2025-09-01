<?php

namespace Bittacora\GeneralConfiguration\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralConfigurationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('general-configuration.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sender_name' => 'nullable',
            'sender_email' => 'nullable',
            'reception_email' => 'nullable',
            'title' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'facebook' => 'nullable',
            'x' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable',
            'whatsapp' => 'nullable',
            'youtube' => 'nullable',
            'tiktok' => 'nullable',
            'business_address' => 'nullable',
            'business_postal_code' => 'nullable',
            'business_city' => 'nullable',
            'business_province' => 'nullable',
            'business_country' => 'nullable',
            'business_phone' => 'nullable',
            'business_fax' => 'nullable',
            'business_mobile' => 'nullable',
            'business_email' => 'nullable',
            'footer_copyright' => 'nullable',
            'footer_description' => 'nullable',
        ];
    }
}
