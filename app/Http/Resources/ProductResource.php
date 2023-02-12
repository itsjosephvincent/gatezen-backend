<?php

namespace App\Http\Resources;

use App\Models\StoreCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'store_category_id' => $this->store_category_id,
            'vat_id' => $this->vat_id,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'wholesale_price' => $this->wholesale_price,
            'reorder_level' => $this->reorder_level,
            'status' => $this->status,
            'release_date' => $this->release_date,
            'slug' => $this->slug,
            'created_at' => $this->created_at,
            'store_category' => new StoreCategoryResource($this->whenLoaded('store_category')),
            'medias' => ProductMediaResource::collection($this->whenLoaded('medias')),
            'category_product' => CategoryProductResource::collection($this->whenLoaded('category_product')),
            'order_details' => OrderDetailResource::collection($this->whenLoaded('order_details')),
            'vat' => new VatResource($this->whenLoaded('vat'))
        ];
    }
}
