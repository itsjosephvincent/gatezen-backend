<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'thumbnail_url' => $this->thumbnail_url,
            'title' => $this->title,
            'content' => $this->content,
            'store_category_id' => $this->store_category_id,
            'blog_category_id' => $this->blog_category_id,
            'slug' => $this->slug,
            'created_at' => $this->created_at,
            'store_category' => new StoreCategoryResource($this->whenLoaded('store_category')),
            'blog_category' => new BlogCategoryResource($this->whenLoaded('blog_category'))
        ];
    }
}
