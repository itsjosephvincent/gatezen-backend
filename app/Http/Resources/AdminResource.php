<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'email' => $this->email,
            'confirmed_at' => $this->confirmed_at,
            'img_url' => $this->img_url,
            'is_2fa_enabled' => $this->is_2fa_enabled,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at
        ];
    }
}
