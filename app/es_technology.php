<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class es_technology extends Model
{
    //
    protected $table = 'es_technology';

    protected $fillable = ['year', 'technology', 'application', 'adoptation_date', 'company_id', 'location_id', 'status', 'remark', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at', 'others', 'others_location'];

    public function location()
    {
        return $this->belongsTo(\App\field::class, 'location_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function statuses()
    {
        return $this->belongsTo(\App\es_project_status::class, 'status');
    }
}
