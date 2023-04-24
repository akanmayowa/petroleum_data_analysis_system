<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARSHECSpillIncidenceMgt extends JsonResource
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
            'spill_number' => $this->spill_number,
            'spill_volume' => $this->spill_volume,
            'quantity_recoverd' => $this->quantity_recoverd,
            'jiv_conducted' => $this->jiv_conducted,
            'community_issued' => $this->community_issued,
        ];
    }
}
