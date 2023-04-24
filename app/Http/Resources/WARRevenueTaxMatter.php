<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARRevenueTaxMatter extends JsonResource
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
            'vat' => $this->vat,
            'paye' => $this->paye,
            'wht' => $this->wht,
            'third_party_bill' => $this->third_party_bill,
            'monthly_expenditure' => $this->monthly_expenditure,
        ];
    }
}
