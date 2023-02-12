<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TgiGetUserBalance extends JsonResource
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
            'balance_money' => $this->balance_money,
            'balance_currency' => $this->balance_currency,
            'paid_total' => $this->paid_total,
            'refunded_total' => $this->refunded_total,
            'visits_total' => $this->visits_total,
            'visits_today' => $this->visits_today,
            'commission_rate' => $this->commission_rate,
            'conversion_rate' => $this->conversion_rate
        ];
    }
}
