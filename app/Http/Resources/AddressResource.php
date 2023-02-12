<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'user_id' => $this->user_id,
            'care_of' => $this->care_of,
            'street_name' => $this->street_name,
            'second_street_name' => $this->second_street_name,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'country' => $this->country,
            'created_at' => $this->created_at
        ];
    }
}
