<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PlanResource;

class ProjectResource extends JsonResource
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
          'name' => $this->name,
          'sid' => $this->sid,
          'start_date' => $this->start_date,
          'end_date' => $this->end_date,
          'status' => $this->status,
          'plans' => PlanResource::collection($this->plans()->orderBy('sequence')->get()),
          'roles' => ProjectRoleResource::collection($this->roles()->orderBy('sequence')->get()),
        ];
    }
}
