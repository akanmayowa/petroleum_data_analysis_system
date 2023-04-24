<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WAREngStandandMaintenance extends JsonResource
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
            'system_failure' => $this->system_failure,
            'system_failure_resolved' => $this->system_failure_resolved,
            'printer_failure' => $this->printer_failure,
            'printer_failure_resolved' => $this->printer_failure_resolved,
            'application_error' => $this->application_error,
            'application_error_resolved' => $this->application_error_resolved,
            'adhoc_issues' => $this->adhoc_issues,
            'adhoc_issues_resolved' => $this->adhoc_issues_resolved,
        ];
    }
}
