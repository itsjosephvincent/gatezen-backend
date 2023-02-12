<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminDashboardResource extends JsonResource
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
            'products' => $this->products,
            'store_users' => $this->store_users,
            'stores' => $this->stores,
            'admin_users' => $this->admin_users,
            'sales_per_month' => $this->sales_per_month
        ];
    }
}
