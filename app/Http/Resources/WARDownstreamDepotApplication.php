<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamDepotApplication extends JsonResource
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
            'proposal_received' => $this->proposal_received,
            'proposal_approved' => $this->proposal_approved,
            'presentation_received' => $this->presentation_received,
            'presentation_approved' => $this->presentation_approved,
            'assessment_received' => $this->assessment_received,
            'assessment_approved' => $this->assessment_approved,
            'atc_received' => $this->atc_received,
            'atc_approved' => $this->atc_approved,
            'presure_test_received' => $this->presure_test_received,
            'presure_test_approved' => $this->presure_test_approved,
            'calibration_received' => $this->calibration_received,
            'calibration_approved' => $this->calibration_approved,
            'final_inspection_received' => $this->final_inspection_received,
            'final_inspection_approved' => $this->final_inspection_approved,
            'renewal_inspection_received' => $this->renewal_inspection_received,
            'renewal_inspection_approved' => $this->renewal_inspection_approved,
            'new_lto_received' => $this->new_lto_received,
            'new_lto_approved' => $this->new_lto_approved,
            'renewal_lto_received' => $this->renewal_lto_received,
            'renewal_lto_approved' => $this->renewal_lto_approved,
            'import_permit_received' => $this->import_permit_received,
            'import_permit_approved' => $this->import_permit_approved,
        ];
    }
}
