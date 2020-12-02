<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phonenumber,
            'email' => $this->email,
            'banned' => $this->is_banned,
            'accepted' => $this->is_accepted,
            'information_completed' => $this->is_information_completed,
            'documentation_completed' => $this->is_document_completed,
            'email_verified' => $this->email_verified_at
        ];
    }
}
