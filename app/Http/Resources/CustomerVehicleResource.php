<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerVehicleResource extends JsonResource
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
            'image' => '',
            'vehicle_brand' => $this->vehicleBrand->name,
            'vehicle_type' => $this->vehicleType->name,
            'vehicle_engine' => $this->vehicleEngine->name,
            'vehicle_transmission' => $this->vehicleTransmission->name,
            'vehicle_year' => $this->vehicle_year,
            'police_number' => $this->police_number
        ];
    }
}
