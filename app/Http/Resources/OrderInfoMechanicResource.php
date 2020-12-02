<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderInfoMechanicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->hashid,
            'image' => $this->attachment->attachmentLink,
            'name' => $this->name,
            'phone' => $this->phonenumber,
            'since' => $this->created_at,
            'rate' => 0,
        ];
    }
}
