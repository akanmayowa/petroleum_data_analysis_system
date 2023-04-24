<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARGasExportOperation extends JsonResource
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
            'application_received' => $this->application_received,
            'application_approved' => $this->application_approved,
            'application_querried' => $this->application_querried,
            'site_verification' => $this->site_verification,
            'approval_for_cng_downloading' => $this->approval_for_cng_downloading,
            'approval_for_lpg_refilling' => $this->approval_for_lpg_refilling,
            'approval_for_lpg_bulk' => $this->approval_for_lpg_bulk,
            'approval_for_lpg_addon' => $this->approval_for_lpg_addon,
            'license_for_cng_downloading' => $this->license_for_cng_downloading,
            'license_for_lpg_refilling' => $this->license_for_lpg_refilling,
            'license_for_lpg_bulk' => $this->license_for_lpg_bulk,
            'license_for_lpg_addon' => $this->license_for_lpg_addon,
            'license_for_lpg_reseller' => $this->license_for_lpg_reseller,
            'facility_inspection_conducted' => $this->facility_inspection_conducted,
        ];
    }
}
