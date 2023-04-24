<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARCorporateServiceMedicalService extends JsonResource
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
            'clinic_visit' => $this->clinic_visit,
            'referral' => $this->referral,
            'sick_leave_case' => $this->sick_leave_case,
            'maternity_leave' => $this->maternity_leave,
            'health_talk' => $this->health_talk,
            'health_walk' => $this->health_walk,
            'immunization' => $this->immunization,
            'canteen_visit' => $this->canteen_visit,
        ];
    }
}
