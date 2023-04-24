<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasExportBonny extends JsonResource
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
            'propane' => $this->propane,
            'butane' => $this->butane,
            'pentane' => $this->pentane,
            'total_no_vessel' => $this->total_no_vessel,
        ];
    }
}
