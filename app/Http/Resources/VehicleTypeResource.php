<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleTypeResource extends JsonResource
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
            'id' => $this->id,
            'image' => $this->attachment->attachmentLink,
            'name' => $this->name,
            'brand' => VehicleBrandResource::collection( $this->whenLoaded('vehicleBrand') ),
            'v_class' => VehicleClassResource::collection( $this->whenLoaded('vehicleClass') )
        ];
    }
}
