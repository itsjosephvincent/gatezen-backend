<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentDetailResource extends JsonResource
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
            'payment_id' => $this->payment_id,
            'payment_method_id' => $this->payment_method_id,
            'payment_token' => $this->payment_token,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'payment_method' => new PaymentMethodResource($this->whenLoaded('payment_method'))
        ];
    }
}
