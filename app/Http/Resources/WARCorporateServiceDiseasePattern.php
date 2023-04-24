<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARCorporateServiceDiseasePattern extends JsonResource
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
            'arthritis' => $this->arthritis,
            'malaria' => $this->malaria,
            'urti' => $this->urti,
            'diabetes' => $this->diabetes,
            'hypertension' => $this->hypertension,
            'viral_syndrome' => $this->viral_syndrome,
        ];
    }
}
