<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'basic_price' => $this->price,
            'recommendation_up' => $this->recommendation_up,
            'duration' => [
                'easy' => $this->duration_easy,
                'medium' => $this->duration_medium,
                'hard' => $this->duration_hard,
            ],
            'is_easy' => $this->is_easy,
            'is_medium' => $this->is_medium,
            'is_hard' => $this->is_hard,
            'categories' => CategoryResource::collection( $this->whenLoaded('categories') )
        ];
    }
}
