<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasExportEscravos extends JsonResource
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
            'lpg' => $this->lpg,
            'condensate' => $this->condensate,
            'transmix' => $this->transmix,
            'total_no_vessel' => $this->total_no_vessel,
        ];
    }
}
