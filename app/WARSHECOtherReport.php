<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARSHECOtherReport extends Model
{
    //
    protected $table = 'war_shec_other_report';

    protected $fillable = ['date', 'week', 'hazop', 'rbi', 'psv_certification', 'leak_test', 'rig_inspection', 'vessel_inspection', 'new_technologies', 'conpliance_monitoring', 'project_monitoring_activities', 'facility_inspection_audit', 'safety_training', 'permit_withdrawal_cases', 'created_by'];
}
