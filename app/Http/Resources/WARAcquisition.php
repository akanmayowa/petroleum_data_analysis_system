<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARAcquisition extends JsonResource
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
            'seismic_data_acquired' => $this->seismic_data_acquired,
            'cumulative_seismic_acquired' => $this->cumulative_seismic_acquired,
            'annual_seismic_acquisition' => $this->annual_seismic_acquisition,
            'seismic_data_processed' => $this->seismic_data_processed,
        ];
    }
}
