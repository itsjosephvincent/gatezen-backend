<?php

namespace App\Http\Resources;

use App\Models\ShippingZoneMethod;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingMethodResource extends JsonResource
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
            'key' => $this->key,
            'name' => $this->name,
            'min_order_amount' => $this->min_order_amount,
            'shipping_fee' => $this->shipping_fee,
            'zone_methods' => new ShippingZoneMethodResource($this->whenLoaded('zone_methods'))
        ];
    }
}
