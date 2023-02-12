<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'product_id' => $this->product_id,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'discount' => $this->discount,
            'vat_id' => $this->vat_id,
            'created_at' => $this->created_at,
            'product' => new ProductResource($this->whenLoaded('product')),
            'order' => new OrderResource($this->whenLoaded('order')),
            'vat' => new VatResource($this->whenLoaded('vat'))
        ];
    }
}
