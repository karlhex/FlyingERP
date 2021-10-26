<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            //
            'name' => ['required', 'string'],
            'phone1' => ['string'],
            'phone2' => ['string'],
            'phone3' => ['string'],
            'email' => ['email'],
            'company_name' => ['string'],
            'department' => ['string'],
            'position' => ['string'],
        ];
    }
}
