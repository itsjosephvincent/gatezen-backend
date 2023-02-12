<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSubscriptionResource extends JsonResource
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
            'plan_id' => $this->plan_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'user' => new UserResource($this->whenLoaded('user')),
            'plan' => new PlanResource($this->whenLoaded('plan')),
        ];
    }
}
