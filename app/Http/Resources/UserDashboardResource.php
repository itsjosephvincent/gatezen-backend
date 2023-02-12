<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDashboardResource extends JsonResource
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
            'orders_count' => $this->orders_count,
            'customers_count' => $this->customers_count,
            'stores_count' => $this->stores_count,
            'sales_per_month' => $this->sales_per_month,
            'commission_per_month' => $this->commission_per_month,
            'payouts' => $this->payouts,
        ];
    }
}
