<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Sos;

class ProjectRequest extends FormRequest
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
            'sid' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable',  'date', 'after:start_date'],
            'status' => ['required', new Sos('prjstatus')],
            'memo' => ['nullable', 'string']
        ];
    }
}
