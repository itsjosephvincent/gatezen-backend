<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerAddressResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'address_type' => $this->address_type,
            'care_of' => $this->care_of,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'state' => $this->state,
            'city' => $this->city,
            'postal_code' => $this->postal_code,
            'country_id' => $this->country_id,
            'delivery_notes' => $this->delivery_notes,
            'created_at' => $this->created_at,
            'country' => new CountryResource($this->whenLoaded('country'))
        ];
    }
}
