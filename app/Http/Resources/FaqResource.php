<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'store_category_id' => $this->store_category_id,
            'faq_category_id' => $this->faq_category_id,
            'created_at' => $this->created_at,
            'store_category' => new StoreCategoryResource($this->whenLoaded('store_category')),
            'faq_category' => new FaqCategoryResource($this->whenLoaded('faq_category'))
        ];
    }
}
