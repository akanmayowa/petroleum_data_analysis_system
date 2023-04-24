<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_processing_plant_project extends Model
{
    //
    protected $table = 'gas_processing_plant_project';

    protected $fillable = ['year', 'project_title', 'project_objective', 'lng', 'ng', 'cng', 'lpg', 'ngr', 'condensate', 'fertilizer', 'petrochemical', 'company_id', 'others', 'location_id', 'start_date', 'end_date', 'status_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function location()
    {
        return $this->belongsTo(\App\field::class, 'location_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\es_project_status::class, 'status_id');
    }
}
