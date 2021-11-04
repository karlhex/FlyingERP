<?php

namespace App\Http\Resources;

use App\Http\Resources\EducationResource;
use App\Http\Resources\PEResource;
use App\Http\Resources\WEResource;
use App\Http\Resources\CEResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'fullname' => $this->fullname,
            'employee_sid' => $this->employee_sid,
            'national_id' => $this->national_id,
            'sex' => $this->sex,
            'email' => $this->email,
            'birthday' => $this->birthday,
            'origin_city' => $this->origin_city,
            'resident_city' => $this->resident_city,
            'ethnic' => $this->ethnic,
            'department' => $this->department,
            'role' => $this->role,
            'level' => $this->level,
            'join_date' => $this->join_date,
            'sign_date' => $this->sign_date,
            'sign_type' => $this->sign_type,
            'sign_period' => $this->sign_period,
            'work_date' => $this->work_date,
            'phone' => $this->phone,
            'address' => $this->address,
            'emergency_person' => $this->emergency_person,
            'emergency_phone' => $this->emergency_phone,
            'bank' => $this->bank,
            'accoount' => $this->account,
            'si_city' => $this->si_city,
            'si_account' => $this->si_account,
            'pf_account' => $this->pf_account,
            'project_experiences' => PEResource::collection($this->project_experiences()->orderBy('sequence')->get()),
            'work_experiences' => WEResource::collection($this->work_experiences()->orderBy('sequence')->get()),
            'educations' => EducationResource::collection($this->educations()->orderBy('sequence')->get()),
            'certificates' => CEResource::collection($this->certificates()->orderBy('sequence')->get()),
        ];
    }
}
