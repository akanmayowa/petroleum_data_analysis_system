<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamRefineryPHRC extends JsonResource
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
            'type_id' => $this->type_id,
            'week' => $this->week,
            'pms' => $this->pms,
            'hhk' => $this->hhk,
            'ago' => $this->ago,
            'atk' => $this->atk,
            'fuel_oil' => $this->fuel_oil,
        ];
    }
}
