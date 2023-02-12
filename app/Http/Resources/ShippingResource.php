<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingResource extends JsonResource
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
            'order_id' => $this->order_id,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'city' => $this->city,
            'postal_code' => $this->postal_code,
            'country_id' => $this->country_id,
            'mobile_no' => $this->mobile_no,
            'delivery_notes' => $this->delivery_notes,
            'address_type' => $this->address_type,
            'created_at' => $this->created_at,
            'country' => new CountryResource($this->whenLoaded('country'))
        ];
    }
}
