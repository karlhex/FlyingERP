<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Sos;

class EmployeeRequest extends FormRequest
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
            'user_id' => ['nullable', 'numeric'],
            'fullname' => ['required', 'string'],
            'employee_sid' => ['required', 'string'],
            'national_id' => ['required', 'string', 'size:20'],
            'sex' => ['required', Rule::in(['M','F'])],
            'email' => ['nullable', 'email'],
            'birthday' => ['required', 'date'],
            'origin_city' => ['required'],
            'resident_city' => ['required'],
            'ethnic' => ['required'],
            'department' => ['required', Rule::in(['HO','HRD','GAD','SD','RND','PD','ED','AD','ASSD'])],
            'role' => ['required', new Sos('role')],
            'level' => ['required', 'numeric', 'between:1,20'],
            'join_date' => ['required', 'date'],
            'sign_date' => ['required', 'date'],
            'sign_type' => ['required', Rule::in(['LT', 'ST'])],
            'sign_period' => ['required', 'numeric', 'between:1,36'],
            'work_date' => ['required', 'date'],
            'phone' => [ 'nullable', 'string'],
            'address' => [ 'nullable', 'string'],
            'emergency_person' => [ 'nullable', 'string'],
            'emergency_phone' => [ 'nullable', 'string'],
            'bank' => [ 'nullable', 'string'],
            'accoount' => [ 'nullable', 'string'],
            'si_city' => [ 'nullable', 'string'],
            'si_account' => [ 'nullable', 'string'],
            'pf_account' => [ 'nullable', 'string'],
        ];
    }
}
