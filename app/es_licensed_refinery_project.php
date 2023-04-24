<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class es_licensed_refinery_project extends Model
{
    //
    protected $table = 'es_licensed_refinery_project';

    protected $fillable = ['year', 'project_name', 'location', 'field_id', 'capacity', 'refinery_type', 'license_granted', 'estimated_completion', 'license_validity', 'license_expiration_date', 'status_remark', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    // public function company()
    // {
    // 	return $this->belongsTo('App\company', 'company_id');
    // }
    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }

    public function validity()
    {
        return $this->belongsTo(\App\es_project_status::class, 'license_validity');
    }
}
