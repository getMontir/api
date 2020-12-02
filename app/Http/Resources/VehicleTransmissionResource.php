<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleTransmissionResource extends JsonResource
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
            'from_year' => $this->from_year,
            'to_year' => $this->to_year,
            'type' => VehicleTypeResource::collection( $this->whenLoaded('vehicleType') ),
            'engine' => VehicleEngineResource::collection( $this->whenLoaded('vehicleEngine') ),
        ];
    }
}
