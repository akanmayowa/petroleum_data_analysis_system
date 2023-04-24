<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_spill_incidence_report extends Model
{
    //
    protected $table = 'she_spill_incidence_report';

    protected $fillable = ['year', 'month', 'natural_accident', 'corrosion', 'equipment_failure', 'sabotage', 'human_error', 'ytbd', 'mystery', 'erosion_wave_sand', 'operational_maintenance', 'sunken_barge', 'total_no_of_spills', 'volume_spilled', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];
}
