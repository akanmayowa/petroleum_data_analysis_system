<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasFlare extends JsonResource
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
            'permit_to_flare' => $this->permit_to_flare,
            'quantity_approved' => $this->quantity_approved,
            'quantity_under_review' => $this->quantity_under_review,
        ];
    }
}
