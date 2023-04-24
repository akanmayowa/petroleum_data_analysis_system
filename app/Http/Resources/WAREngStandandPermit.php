<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WAREngStandandPermit extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return
        [
            'id' => $this->id,
            'date' => $this->date,
            'week' => $this->week,
            'general_received' => $this->general_received,
            'general_issued' => $this->general_issued,
            'major_received' => $this->major_received,
            'major_issued' => $this->major_issued,
            'specialised_received' => $this->specialised_received,
            'specialised_issued' => $this->specialised_issued,
        ];
    }
}
