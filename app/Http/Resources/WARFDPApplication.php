<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARFDPApplication extends JsonResource
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
            'application_received' => $this->application_received,
            'application_approved' => $this->application_approved,
            'production_rate' => $this->production_rate,
            'expected_reserve' => $this->expected_reserve,
            'total_cost' => $this->total_cost,
        ];
    }
}
