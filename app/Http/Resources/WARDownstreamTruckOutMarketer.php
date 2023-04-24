<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamTruckOutMarketer extends JsonResource
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
            'segment_id' => $this->segment_id,
            'pms' => $this->pms,
            'dpk' => $this->dpk,
            'ago' => $this->ago,
            'segment' => $this->segment,
        ];
    }
}
