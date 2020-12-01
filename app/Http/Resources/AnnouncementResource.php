<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'dt_start' => $this->date_time_start,
            'dt_end' => $this->date_time_end,
            'dt_start_formatted' => $this->when( !empty($this->date_time_start), $this->date_time_start->format( get_system_date_time_format() ) ),
            'dt_end_formatted' => $this->when( !empty($this->date_time_end), $this->date_time_end->format( get_system_date_time_format() ) )
        ];
    }
}
