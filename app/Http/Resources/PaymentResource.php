<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'amount' => $this->amount,
            'status' => $this->status,
            'reference' => $this->reference,
            'notes' => $this->notes,
            'paid_at' => $this->paid_at,
            'created_at' => $this->created_at,
            'payment_details' => new PaymentDetailResource($this->whenLoaded('payment_details'))
        ];
    }
}
