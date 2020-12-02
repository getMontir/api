<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnerServiceResource extends JsonResource
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
            'basic_price' => $this->basic_price,
            'sale_price' => $this->sale_price,
            'service' => ServiceResource::collection( $this->whenLoaded('service') )
        ];
    }
}
