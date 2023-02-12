<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TheGateIndexResource extends JsonResource
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
            'tgi_user_id' => $this->tgi_user_id,
            'tgi_referral_code' => $this->tgi_referral_code,
            'company_name' => $this->company_name,
            'company_registration_number' => $this->company_registration_number,
            'euro_in_tokens' => $this->euro_in_tokens,
            'euro_in_shares' => $this->euro_in_shares,
            'partner_role_name' => $this->partner_role_name,
            'created_on_date' => $this->created_on_date,
            'portal_id' => $this->portal_id,
            'portal_name' => $this->portal_name,
            'role_id' => $this->role_id,
            'is_partnership_paid' => $this->is_partnership_paid,
            'account_type' => $this->account_type,
            'created_at' => $this->created_at,
        ];
    }
}
