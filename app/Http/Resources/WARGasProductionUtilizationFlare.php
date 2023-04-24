<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasProductionUtilizationFlare extends JsonResource
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
            'ag_produced' => $this->ag_produced,
            'nag_produced' => $this->nag_produced,
            'gas_production' => $this->gas_production,
            'gas_utilization' => $this->gas_utilization,
            'gas_flared' => $this->gas_flared,
            'gas_flared_perc' => $this->gas_flared_perc,
        ];
    }
}
