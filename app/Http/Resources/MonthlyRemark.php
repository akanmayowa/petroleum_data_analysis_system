<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MonthlyRemark extends JsonResource
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
            'year' => $this->year,
            'month' => $this->month,
            'division' => $this->division,
            'tab_name' => $this->tab_name,
            'row_name' => $this->row_name,
            'remark' => $this->remark,
        ];
    }
}
