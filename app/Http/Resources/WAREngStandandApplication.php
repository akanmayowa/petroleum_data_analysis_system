<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WAREngStandandApplication extends JsonResource
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
            'processing_plant_received' => $this->processing_plant_received,
            'processing_plant_issued' => $this->processing_plant_issued,
            'pet_refinery_received' => $this->pet_refinery_received,
            'pet_refinery_issued' => $this->pet_refinery_issued,
            'petrochemical_received' => $this->petrochemical_received,
            'petrochemical_issued' => $this->petrochemical_issued,
            'oil_facility_received' => $this->oil_facility_received,
            'oil_facility_issued' => $this->oil_facility_issued,
            'fert_plant_received' => $this->fert_plant_received,
            'fert_plant_issued' => $this->fert_plant_issued,
            'alternate_fuel_received' => $this->alternate_fuel_received,
            'alternate_fuel_issued' => $this->alternate_fuel_issued,
            'pts_received' => $this->pts_received,
            'pts_issued' => $this->pts_issued,
            'opll_received' => $this->opll_received,
            'opll_issued' => $this->opll_issued,
        ];
    }
}
