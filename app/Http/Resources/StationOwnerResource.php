<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StationOwnerResource extends JsonResource
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
            'member_card' => $this->member_id,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'address' => $this->address,
            'province' => ProvinceResource::collection( $this->whenLoaded('province') ),
            'city' => CityResource::collection( $this->whenLoaded('city') ),
            'district' => DistrictResource::collection( $this->whenLoaded('district') ),
            'postcode' => $this->postcode
        ];
    }
}
