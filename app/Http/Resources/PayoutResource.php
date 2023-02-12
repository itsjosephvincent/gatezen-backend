<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PayoutResource extends JsonResource
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
            'payout_status' => $this->payout_status,
            'user_bank_details' => $this->user_bank_details,
            'reference' => $this->reference,
            'internal_note' => $this->internal_note,
            'amount' => $this->amount,
            'paid_at' => $this->paid_at,
            'created_at' => $this->created_at,
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
