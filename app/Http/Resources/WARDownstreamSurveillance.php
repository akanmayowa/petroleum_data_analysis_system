<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamSurveillance extends JsonResource
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
            'station_visited' => $this->station_visited,
            'station_with_pms' => $this->station_with_pms,
            'sealed_under_dispensing' => $this->sealed_under_dispensing,
            'sealed_for_over_price' => $this->sealed_for_over_price,
            'sealed_for_hoarding' => $this->sealed_for_hoarding,
            'sealed_for_diversion' => $this->sealed_for_diversion,
            'sealed_for_violation_of_seal' => $this->sealed_for_violation_of_seal,
            'other' => $this->other,
            'total_station_sealed' => $this->total_station_sealed,
        ];
    }
}
