<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressBookResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'houseno' => $this->houseno,
            'street' => $this->street,
            'city' => $this->city,
            'postal' => $this->postal,
            'country' => $this->country,
            'mobile_no' => $this->mobile_no,
            'delivery_notes' => $this->delivery_notes,
            'address_type' => $this->address_type,
            'created_at' => $this->created_at,
        ];
    }
}