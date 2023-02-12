<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TemplateResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'repo_url' => $this->repo_url,
            'version' => $this->version,
            'image_url' => $this->image_url,
            'created_at' => $this->created_at,
            'stores' => StoreResource::collection($this->whenLoaded('stores')),
            'store_category' => new StoreCategoryResource($this->whenLoaded('store_category'))
        ];
    }
}
