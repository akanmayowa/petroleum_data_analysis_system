<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARReEntry extends JsonResource
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
            're_entry_commenced' => $this->re_entry_commenced,
            're_entry_ongoing' => $this->re_entry_ongoing,
            're_entry_completed' => $this->re_entry_completed,
            'workover_commenced' => $this->workover_commenced,
            'workover_ongoing' => $this->workover_ongoing,
            'workover_completed' => $this->workover_completed,
            're_entry_completion' => $this->re_entry_completion,
            're_entry_workover' => $this->re_entry_workover,
            're_entry_reserve_addition' => $this->re_entry_reserve_addition,
            'well_expected_rate' => $this->well_expected_rate,
        ];
    }
}
