<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'store_id' => $this->store_id,
            'customer_type' => $this->customer_type,
            'company_name' => $this->company_name,
            'business_number' => $this->business_number,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'display_name' => $this->display_name,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'img_url' => $this->img_url,
            'is_active' => $this->is_active,
            'email_verified_at' => $this->email_verified_at,
            'is_2fa_enabled' => $this->is_2fa_enabled,
            'created_at' => $this->created_at,
            'addresses' => CustomerAddressResource::collection($this->whenLoaded('addresses')),
            'store' => new StoreResource($this->whenLoaded('store')),
            'orders' => OrderResource::collection($this->whenLoaded('orders')),
            'owner' => new UserResource($this->whenLoaded('owner'))
        ];
    }
}
