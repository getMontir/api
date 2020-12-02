<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'payment_method' => [],
            'timestamp' => $this->payment_timestamp,
            'source' => $this->source,
            'amount' => $this->amount,
            'accounting' => $this->extra_accounting,
            'details' => $this->when( !empty($this->data_details), unserialize($this->data_details))
        ];
    }
}
