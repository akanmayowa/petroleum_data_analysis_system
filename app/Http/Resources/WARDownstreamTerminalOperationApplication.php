<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamTerminalOperationApplication extends JsonResource
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
            'export_permit_received' => $this->export_permit_received,
            'export_permit_approved' => $this->export_permit_approved,
            'establishment_received' => $this->establishment_received,
            'establishment_approved' => $this->establishment_approved,
            'suttle_trucking_received' => $this->suttle_trucking_received,
            'suttle_trucking_approved' => $this->suttle_trucking_approved,
            'suttle_bargingreceived' => $this->suttle_bargingreceived,
            'suttle_bargingapproved' => $this->suttle_bargingapproved,
            'tank_calibration_received' => $this->tank_calibration_received,
            'tank_calibration_approved' => $this->tank_calibration_approved,
            'calibration_proving_received' => $this->calibration_proving_received,
            'calibration_proving_approved' => $this->calibration_proving_approved,
            'instrument_calibration_received' => $this->instrument_calibration_received,
            'instrument_calibration_approved' => $this->instrument_calibration_approved,
        ];
    }
}
