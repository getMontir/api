<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemServiceResource extends JsonResource
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
            'item' => $this->when( !empty($this->service), [
                'id' => $this->service->hashid,
                'image' => $this->service->attachment->attachmentLink,
                'name' => $this->service->name,
            ]),
            'amount' => $this->amount,
            'total_amount' => $this->total_amount,
            'discount_amount' => $this->discount_amount,
            'discount' => $this->discount,
            'notes' => $this->notes,
            'qty' => 1,
        ];
    }
}
