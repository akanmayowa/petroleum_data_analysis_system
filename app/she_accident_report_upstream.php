<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_accident_report_upstream extends Model
{
    //
    protected $table = 'she_accident_report_upstream';

    protected $fillable = ['year', 'month', 'incidents', 'work_related', 'non_work_related', 'fatal_incident', 'non_fatal_incident', 'work_related_fatal_incident', 'non_work_related_fatal_incident', 'fatality', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function approvals()
    {
        return $this->morphMany(\App\Approval::class, 'approvable');
    }
}
