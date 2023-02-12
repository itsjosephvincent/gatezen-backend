<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreUserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'store_id' => $this->store_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'store' => new StoreResource($this->whenLoaded('store'))
        ];
    }
}
