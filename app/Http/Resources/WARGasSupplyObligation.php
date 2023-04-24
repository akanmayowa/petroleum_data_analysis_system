<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasSupplyObligation extends JsonResource
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
            'allocated_dgso' => $this->allocated_dgso,
            'dom_gas_supply' => $this->dom_gas_supply,
            'dgso_performance' => $this->dgso_performance,
        ];
    }
}
