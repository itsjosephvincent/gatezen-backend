<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'store_id' => $this->store_id,
            'shipping_method_id' => $this->shipping_method_id,
            'status' => $this->status,
            'number' => $this->number,
            'date' => $this->date,
            'order_total' => $this->order_total,
            'confirmed_date' => $this->confirmed_date,
            'reference' => $this->reference,
            'note' => $this->note,
            'created_at' => $this->created_at,
            'order_details' => OrderDetailResource::collection($this->whenLoaded('order_details')),
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'store' => new StoreResource($this->whenLoaded('store')),
            'shipping_address' => new ShippingResource($this->whenLoaded('shipping_address')),
            'payment' => new PaymentResource($this->whenLoaded('payment')),
            'shipping_method' => new ShippingMethodResource($this->whenLoaded('shipping_method'))
        ];
    }
}
