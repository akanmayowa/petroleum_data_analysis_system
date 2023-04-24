<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WAREngStandandDevelopment extends JsonResource
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
            'deep_offshore_project' => $this->deep_offshore_project,
            'western_area_project' => $this->western_area_project,
            'eastern_area_project' => $this->eastern_area_project,
            'pipeline_project' => $this->pipeline_project,
        ];
    }
}
