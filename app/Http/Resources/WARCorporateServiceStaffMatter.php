<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARCorporateServiceStaffMatter extends JsonResource
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
            'staff_strength' => $this->staff_strength,
            'retired' => $this->retired,
            'deceased' => $this->deceased,
            'commence_annual_leave' => $this->commence_annual_leave,
            'resumed_annaul_leave' => $this->resumed_annaul_leave,
            'new_disiplinary_case' => $this->new_disiplinary_case,
            'contractor_registered' => $this->contractor_registered,
            'local_training' => $this->local_training,
            'overseas_training' => $this->overseas_training,
        ];
    }
}
