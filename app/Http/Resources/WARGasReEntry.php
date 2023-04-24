<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasReEntry extends JsonResource
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
            'completion' => $this->completion,
            'workover' => $this->workover,
            'total_reserve_addition' => $this->total_reserve_addition,
            'expected_rate' => $this->expected_rate,
        ];
    }
}
