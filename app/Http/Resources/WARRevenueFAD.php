<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARRevenueFAD extends JsonResource
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
            'revenue' => $this->revenue,
            'revenue_receipt_issued' => $this->revenue_receipt_issued,
            'fund_transfer' => $this->fund_transfer,
            'personnel_cost' => $this->personnel_cost,
            'medical_bill_transfer' => $this->medical_bill_transfer,
            'outsorced_secuirity_services' => $this->outsorced_secuirity_services,
            'outsorced_cleaning_services' => $this->outsorced_cleaning_services,
            'penalty_fee' => $this->penalty_fee,
            'overhead_allocation' => $this->overhead_allocation,
            'salary_allowance' => $this->salary_allowance,
        ];
    }
}
