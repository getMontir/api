<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
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
            'type' => $this->type,
            'name' => $this->name,
            'percentage' => [
                'customer' => $this->customer_percentage,
                'getmontir' => $this->getmontir_percentage,
                'station' => $this->station_percentage,
                'mechanic' => $this->mechanic_percentage
            ],
            'action' => $this->action,
            'parameter' => $this->parameter,
            'debug' => $this->is_debug_mode,
            'open_default' => $this->is_open_by_default
        ];
    }
}
