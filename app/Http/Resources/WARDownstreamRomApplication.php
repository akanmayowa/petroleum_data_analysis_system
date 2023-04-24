<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamRomApplication extends JsonResource
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
            'suitability_inspection_received' => $this->suitability_inspection_received,
            'suitability_inspection_approved' => $this->suitability_inspection_approved,
            'atc_received' => $this->atc_received,
            'atc_approved' => $this->atc_approved,
            'pressure_test_received' => $this->pressure_test_received,
            'pressure_test_approved' => $this->pressure_test_approved,
            'tank_buried_received' => $this->tank_buried_received,
            'tank_buried_approved' => $this->tank_buried_approved,
            'leak_detection_received' => $this->leak_detection_received,
            'leak_detection_approved' => $this->leak_detection_approved,
            'final_inspection_received' => $this->final_inspection_received,
            'final_inspection_approved' => $this->final_inspection_approved,
            'renewal_inspection_received' => $this->renewal_inspection_received,
            'renewal_inspection_approved' => $this->renewal_inspection_approved,
            'vessel_license_received' => $this->vessel_license_received,
            'vessel_license_approved' => $this->vessel_license_approved,
        ];
    }
}
