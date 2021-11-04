<?php

namespace App\Http\Resources;

use App\Http\Resources\ProductResource;
use App\Http\Resources\SopResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
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
            'project' => $this->project(),
            'sid' => $this->sid,
            'peer_sid' => $this->peer_sid,
            'title' => $this->title,
            'company' => $this->company(),
            'type' => $this->type,
            'stage' => $this->stage,
            'amount' => $this->amount,
            'sign_date' => $this->sign_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'contract_person' => $this->contract_person(),
            'sops' => SopResource::collection($this->sops()->orderBy('sequence')->get()),
            'products' => ProductResource::collection($this->products()->orderBy('sequence')->get()),
        ];
    }
}
