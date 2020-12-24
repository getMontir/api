<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailCustomerResource extends JsonResource
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
            'user' => UserResource::collection( $this->whenLoaded('user') ),
            'member_card' => $this->member_id,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'address' => $this->address,
            'province' => new ProvinceResource( $this->whenLoaded('province') ),
            'city' => new CityResource( $this->whenLoaded('city') ),
            'district' => new DistrictResource( $this->whenLoaded('district') ),
            'postcode' => $this->postcode,
            'vehicles' => CustomerVehicleResource::collection( $this->whenLoaded('customerVehicles') ),
        ];
    }
}
