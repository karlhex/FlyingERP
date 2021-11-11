<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'address' => ['nullable', 'string'],
            'site' => ['nullable', 'url'],
            'phone' => ['required', 'string'],
            'business_person_id' => ['nullable'],
            'tech_person_id' => ['nullable'],
            'account_id' => ['nullable'],
            'tax_info_id' => ['nullable'],
        ];
    }
}
