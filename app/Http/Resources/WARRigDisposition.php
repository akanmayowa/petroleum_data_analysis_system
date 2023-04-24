<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARRigDisposition extends JsonResource
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
            'active_rig' => $this->active_rig,
            'statcked_rig' => $this->statcked_rig,
            'rig_on_standby' => $this->rig_on_standby,
            'total_rig' => $this->total_rig,
        ];
    }
}
