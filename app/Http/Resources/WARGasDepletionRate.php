<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasDepletionRate extends JsonResource
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
            'ag_reserves' => $this->ag_reserves,
            'nag_reserves' => $this->nag_reserves,
            'ag_depletion' => $this->ag_depletion,
            'nag_depletion' => $this->nag_depletion,
            'ag_life_year' => $this->ag_life_year,
            'nag_life_year' => $this->nag_life_year,
        ];
    }
}
