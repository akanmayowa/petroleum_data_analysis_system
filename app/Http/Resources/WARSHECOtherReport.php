<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARSHECOtherReport extends JsonResource
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
            'hazop' => $this->hazop,
            'rbi' => $this->rbi,
            'psv_certification' => $this->psv_certification,
            'leak_test' => $this->leak_test,
            'rig_inspection' => $this->rig_inspection,
            'vessel_inspection' => $this->vessel_inspection,
            'new_technologies' => $this->new_technologies,
            'conpliance_monitoring' => $this->conpliance_monitoring,
            'project_monitoring_activities' => $this->project_monitoring_activities,
            'facility_inspection_audit' => $this->facility_inspection_audit,
            'safety_training' => $this->safety_training,
            'permit_withdrawal_cases' => $this->permit_withdrawal_cases,
            'remediation_new_application' => $this->remediation_new_application,
            'remediation_approval_granted' => $this->remediation_approval_granted,
        ];
    }
}
