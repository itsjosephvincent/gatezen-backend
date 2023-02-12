<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'template_id' => $this->template_id,
            'store_category_id' => $this->store_category_id,
            'url' => $this->url,
            'store_name' => $this->store_name,
            'status' => $this->status,
            'is_private' => $this->is_private,
            'is_wholesaler' => $this->is_wholesaler,
            'theme_color' => $this->theme_color,
            'text_color' => $this->text_color,
            'template_version' => $this->template_version,
            'created_at' => $this->created_at,
            'store_users' => StoreUserResource::collection($this->whenLoaded('store_users')),
            'store_owner' => new StoreUserResource($this->whenLoaded('store_owner')),
            'template' => new TemplateResource($this->whenLoaded('template')),
            'store_category' => new StoreCategoryResource($this->whenLoaded('store_category'))
        ];
    }
}
