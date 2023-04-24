<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamRefineryPerformanceUtilization extends JsonResource
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
            'refinery_id' => $this->refinery_id,
            'date' => $this->date,
            'week' => $this->week,
            'install_capacity' => $this->install_capacity,
            'opening_stock' => $this->opening_stock,
            'crude_receipt' => $this->crude_receipt,
            'crude_processed' => $this->crude_processed,
            'closing_stock' => $this->closing_stock,
            'capacity_utilization' => $this->capacity_utilization,
            'refinery' => $this->refinery,
        ];
    }
}
