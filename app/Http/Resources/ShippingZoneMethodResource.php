<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingZoneMethodResource extends JsonResource
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
            'shipping_zone_id' => $this->shipping_zone_id,
            'shipping_method_id' => $this->shipping_method_id,
            'shipping_zone' => new ShippingZoneResource($this->whenLoaded('shipping_zone')),
            'shipping_method' => new ShippingMethodResource($this->whenLoaded('shipping_method'))
        ];
    }
}
