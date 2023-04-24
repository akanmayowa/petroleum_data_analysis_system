<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDepletionRate extends JsonResource
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
            'annual_production_oil' => $this->annual_production_oil,
            'annual_production_condensate' => $this->annual_production_condensate,
            'depletion_rate_oil' => $this->depletion_rate_oil,
            'depletion_rate_condensate' => $this->depletion_rate_condensate,
            'year_start_reserve_oil' => $this->year_start_reserve_oil,
            'year_start_reserve_condensate' => $this->year_start_reserve_condensate,
            'life_index_oil' => $this->life_index_oil,
            'life_index_condensate' => $this->life_index_condensate,
        ];
    }
}
