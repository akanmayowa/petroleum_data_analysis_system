<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARCorporateServiceLogistics extends JsonResource
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
            'newly_received_vehicle' => $this->newly_received_vehicle,
            'fleet_utilization' => $this->fleet_utilization,
            'coaster_bus' => $this->coaster_bus,
            'hilux' => $this->hilux,
            'cars' => $this->cars,
            'peugeot_bus' => $this->peugeot_bus,
            'mits_p_up_van' => $this->mits_p_up_van,
            'land_cruiser' => $this->land_cruiser,
            'prado_suv' => $this->prado_suv,
            'hiace_bus' => $this->hiace_bus,
            'ambulance' => $this->ambulance,
        ];
    }
}
