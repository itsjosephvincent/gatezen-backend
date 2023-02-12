<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingZoneResource extends JsonResource
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
            'store_category_id' => $this->store_category_id,
            'countries' => $this->countries,
            'zone_methods' => ShippingZoneMethodResource::collection($this->whenLoaded('zone_methods'))
        ];
    }
}
