<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_petrochemical_plant_project extends Model
{
    //
    protected $table = 'down_petrochemical_plant_project';

    protected $fillable = ['year', 'company', 'location', 'plant_name', 'plant_type', 'capacity_by_unit', 'output_yield', 'status', 'start_year', 'estimated_completion', 'project_desc_by_unit', 'feed', 'remark', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    // public function company()
    // {
    //     return $this->belongsTo('App\company', 'company_id');
    // }

    public function statuses()
    {
        return $this->belongsTo(\App\es_project_status::class, 'status');
    }
}
