<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommissionResource extends JsonResource
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
            'commissionable_type' => $this->commissionable_type,
            'commissionable_id' => $this->commissionable_id,
            'sales_amount' => $this->sales_amount,
            'amount' => $this->amount,
            'approved_by' => $this->approved_by,
            'approved_at' => $this->approved_at,
            'internal_note' => $this->internal_note,
            'payout_id' => $this->payout_id,
            'created_at' => $this->created_at,
            'user' => new UserResource($this->whenLoaded('user')),
            'payout' => new PayoutResource($this->whenLoaded('payout')),
            'commissionable' => new CommissionableResource($this->commissionable)
        ];
    }
}
