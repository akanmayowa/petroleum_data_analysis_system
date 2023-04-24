<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasDrilling extends JsonResource
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
            'exploration_commenced' => $this->exploration_commenced,
            'exploration_ongoing' => $this->exploration_ongoing,
            'exploration_completed' => $this->exploration_completed,
            'appraisal_commenced' => $this->appraisal_commenced,
            'appraisal_ongoing' => $this->appraisal_ongoing,
            'appraisal_completed' => $this->appraisal_completed,
            'development_commenced' => $this->development_commenced,
            'development_ongoing' => $this->development_ongoing,
            'development_completed' => $this->development_completed,
            'well_completion' => $this->well_completion,
            'well_spudded' => $this->well_spudded,
        ];
    }
}
