<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnerSparepartResource extends JsonResource
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
            'gm_buy_price' => $this->gm_buy_price,
            'gm_sale_price' => $this->gm_sale_price,
            'buy_price' => $this->buy_price,
            'sale_price' => $this->sale_price,
            'upby' => $this->upby
        ];
    }
}
