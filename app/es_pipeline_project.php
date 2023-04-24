<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class es_pipeline_project extends Model
{
    //
    protected $table = 'es_pipeline_project';

    protected $fillable = ['year', 'pipeline_name', 'owner_id', 'owner_details', 'origin', 'destination', 'nominal_size', 'length', 'process_fluid', 'start_date', 'commissioning_date', 'status_id', 'remark', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function owner()
    {
        return $this->belongsTo(\App\company::class, 'owner_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\es_project_status::class, 'status_id');
    }
}
