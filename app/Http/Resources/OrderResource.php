<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'po_number' => $this->reff,
            'dt_order' => $this->order_timestamp,
            'dt_service' => $this->order_timestamp,
            'address' => $this->address,
            'notes' => $this->point_notes,
            'service_location' => [
                'latitude' => $this->service_location->getLat(),
                'longitude' => $this->service_location->getLng(),
            ],
            'mechanic_location' => [
                'latitude' => $this->mechanic_location->getLat(),
                'longitude' => $this->mechanic_location->getLng()
            ],
            'station_location' => [
                'latitude' => $this->station_location->getLat(),
                'longitude' => $this->station_location->getLng()
            ],

            'items' => [
                'services' => OrderItemServiceResource::collection( $this->whenLoaded('detailServices') ),
                'spareparts' => OrderItemSparepartResource::collection( $this->whenLoaded('detailSpareparts') ),
                'emergency'  => OrderItemEmergencyResource::collection( $this->whenLoaded('detailEmergency') ),
            ],
            
            'vehicle' => CustomerVehicleResource::collection( $this->whenLoaded('customerVehicle') ),
            'customer' => OrderInfoCustomerResource::collection( $this->whenLoaded('customer') ),
            'mechanic' => OrderInfoMechanicResource::collection( $this->whenLoaded('mechanic') ),
            'station' => OrderInfoStationResource::collection( $this->whenLoaded('station') )
        ];
    }
}
