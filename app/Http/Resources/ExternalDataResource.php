<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExternalDataResource extends JsonResource
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
            'external_id' => $this->external_id,
            'data' => $this->data,
            'external_data_type_id' => $this->external_data_type_id,
            'externable_type' => $this->externable_type,
            'externable_id' => $this->externable_id,
            'created_at' => $this->created_at
        ];
    }
}
