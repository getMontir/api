<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StationDocumentResource extends JsonResource
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
            'owner_identity' => $this->fileOwnerIdentity->attachmentLink,
            'station_image' => $this->fileStationImage->attachmentLink,
            'station_skpt' => $this->fileStationSkpt->attachmentLink,
            'station_pbb' => $this->fileStationPbb->attachmentLink,
            'station_skrk' => $this->fileStationSkrk->attachmentLink,
            'accepted_owner_identity' => $this->is_accepted_owner_identity,
            'accepted_station_image' => $this->is_accepted_station_image,
            'accepted_station_skpt' => $this->is_accepted_skpt_image,
            'accepted_station_pbb' => $this->is_accepted_pbb_image,
            'accepted_station_skrk' => $this->is_accepted_skrk_image
        ];
    }
}
