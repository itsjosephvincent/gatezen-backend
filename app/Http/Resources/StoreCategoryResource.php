<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreCategoryResource extends JsonResource
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
            'name' => $this->name,
            'img_url' => $this->img_url,
            'description' => $this->description,
            'status' => $this->status,
            'logo_url' => $this->logo_url,
            'created_at' => $this->created_at,
            'templates' => TemplateResource::collection($this->whenLoaded('templates')),
            'stores' => StoreResource::collection($this->whenLoaded('stores')),
            'products' => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
