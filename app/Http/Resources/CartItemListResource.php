<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemListResource extends JsonResource
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
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'shipping_id' => $this->shipping_id,
            'shipping_key' => $this->shipping_key,
            'shipping_method' => $this->shipping_method,
            'shipping_fee' => $this->shipping_fee,
            'vat' => $this->vat,
            'total' => $this->total,
            'cart' => $this->cart
        ];
    }
}
