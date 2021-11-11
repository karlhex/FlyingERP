<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
          'sequence' => $this->sequence,
          'instruction' => $this->instruction,
          'start_date' => $this->start_date,
          'end_date' => $this->end_date,
          'act_start_date' => $this->act_start_date,
          'act_end_date' => $this->act_end_date,
          'status' => $this->status,
          'charge_employee' => $this->charge_employee,
          'action_employee' => $this->action_employee,
        ];
    }
}
