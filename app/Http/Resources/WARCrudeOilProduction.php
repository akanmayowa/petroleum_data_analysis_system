<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARCrudeOilProduction extends JsonResource
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
            'avg_oil_condensate_production' => $this->avg_oil_condensate_production,
            'deferment' => $this->deferment,
            'producing_companies' => $this->producing_companies,
            'producing_field' => $this->producing_field,
            'shut_in_field' => $this->shut_in_field,
        ];
    }
}
