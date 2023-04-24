<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasUtilization extends JsonResource
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
            'fuel_gas' => $this->fuel_gas,
            'gas_lift' => $this->gas_lift,
            'gas_reinjection' => $this->gas_reinjection,
            'ngl_lpg' => $this->ngl_lpg,
            'gas_to_ipp' => $this->gas_to_ipp,
            'local_supply' => $this->local_supply,
            'gas_export' => $this->gas_export,
        ];
    }
}
