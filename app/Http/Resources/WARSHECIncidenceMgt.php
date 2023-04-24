<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARSHECIncidenceMgt extends JsonResource
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
            'incidence_accident' => $this->incidence_accident,
            'fatal_incidence' => $this->fatal_incidence,
            'fatalities' => $this->fatalities,
            'work_related' => $this->work_related,
            'non_work_related' => $this->non_work_related,
        ];
    }
}
