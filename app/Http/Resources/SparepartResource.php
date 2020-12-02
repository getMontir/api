<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SparepartResource extends JsonResource
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
            'basic_price_buy' => $this->buy_price,
            'basic_price_sale' => $this->price_sale,
            'duration' => [
                'easy' => $this->duration_normal,
                'hard' => $this->duration_hard
            ],

            'brand' => SparepartBrandResource::collection( $this->whenLoaded('sparepartBrand') ),
            'engine' => VehicleEngineResource::collection( $this->whenLoaded('vehicleEngine') ),
            'service' => ServiceResource::collection( $this->whenLoaded('service') ),
            'categories' => CategoryResource::collection( $this->whenLoaded('sparepartCategories') ),
        ];
    }
}
