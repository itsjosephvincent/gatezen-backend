<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'birthdate' => $this->birthdate,
            'confirmed_at' => $this->confirmed_at,
            'img_url' => $this->img_url,
            'is_active' => $this->is_active,
            'is_2fa_enabled' => $this->is_2fa_enabled,
            'created_at' => $this->created_at,
            'stores_user' => StoreUserResource::collection($this->whenLoaded('stores_user')),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'user_subscription' => new UserSubscriptionResource($this->whenLoaded('user_subscription')),
            'the_gate_index' => new TheGateIndexResource($this->whenLoaded('the_gate_index'))
        ];
    }
}
