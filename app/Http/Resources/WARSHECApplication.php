<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARSHECApplication extends JsonResource
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
            'environment_application_receiced' => $this->environment_application_receiced,
            'environment_application_issued' => $this->environment_application_issued,
            'discharge_permit_receiced' => $this->discharge_permit_receiced,
            'discharge_permit_issued' => $this->discharge_permit_issued,
            'radiation_safety_permit_receiced' => $this->radiation_safety_permit_receiced,
            'radiation_safety_permit_issued' => $this->radiation_safety_permit_issued,
            'safety_case_permit_receiced' => $this->safety_case_permit_receiced,
            'safety_case_permit_issued' => $this->safety_case_permit_issued,
            'lab_accredition_receiced' => $this->lab_accredition_receiced,
            'lab_accredition_issued' => $this->lab_accredition_issued,
            'chemical_application_receiced' => $this->chemical_application_receiced,
            'chemical_application_issued' => $this->chemical_application_issued,
            'registration_application_received' => $this->registration_application_received,
            'registration_application_issued' => $this->registration_application_issued,
        ];
    }
}
