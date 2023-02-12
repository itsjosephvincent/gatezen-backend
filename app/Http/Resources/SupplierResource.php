<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
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
            'company_name' => $this->company_name,
            'contact_no' => $this->contact_no,
            'email_address' => $this->email_address,
            'street' => $this->street,
            'country_id' => $this->country_id,
            'postal' => $this->postal,
            'created_at' => $this->created_at
        ];
    }
}
