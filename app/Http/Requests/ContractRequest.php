<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Sos;

class ContractRequest extends FormRequest
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
            'project_id' => ['required', 'numeric'],
            'company_id' => ['required', 'numeric'],
            'sid' => ['required', 'string', Rule::unique('contracts')->ignore($this->id),],
            'peer_sid' => ['nullable', 'string'],
            'title' => ['required', 'string'],
            'type' => ['required', new Sos('contracttype')],
            'stage' => ['required', new Sos('contractstage')],
            'amount' => ['required', 'numeric'],
            'sign_date' => ['required', 'date'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'contact_person' => ['required', 'numeric'],
        ];
    }
}
