<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class es_metering extends Model
{
    //
    protected $table = 'es_metering';

    protected $fillable = ['year', 'facility_id', 'company_id', 'others', 'objective', 'service_id', 'phase_id', 'start_date', 'commissioning_date', 'remark', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function facility()
    {
        return $this->belongsTo(\App\facility::class, 'facility_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function service()
    {
        return $this->belongsTo(\App\es_service::class, 'service_id');
    }

    public function phase()
    {
        return $this->belongsTo(\App\es_project_status::class, 'phase_id');
    }
}
