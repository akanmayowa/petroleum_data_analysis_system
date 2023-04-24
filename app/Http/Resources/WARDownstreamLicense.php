<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamLicense extends JsonResource
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
            'category_a_new' => $this->category_a_new,
            'category_a_renewal' => $this->category_a_renewal,
            'category_b_new' => $this->category_b_new,
            'category_b_renewal' => $this->category_b_renewal,
            'category_c_new' => $this->category_c_new,
            'category_c_renewal' => $this->category_c_renewal,
            'total_cat_a' => $this->total_cat_a,
            'total_cat_b' => $this->total_cat_b,
            'total_cat_c' => $this->total_cat_c,
        ];
    }
}
