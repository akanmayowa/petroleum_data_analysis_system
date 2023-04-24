<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamTerminalOperation extends JsonResource
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
            'oil_condensate_production' => $this->oil_condensate_production,
            'oil_condensate_export' => $this->oil_condensate_export,
            'refinery_supply' => $this->refinery_supply,
        ];
    }
}
