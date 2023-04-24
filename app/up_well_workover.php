<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_well_workover extends Model
{
    //
    protected $table = 'up_well_workover';

    protected $fillable = ['year', 'month', 'field_id', 'company_id', 'concession_id', 'type_id', 'well', 'facility_id', 'section', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function concession()
    {
        return $this->belongsTo(\App\concession::class, 'concession_id');
    }

    public function facility()
    {
        return $this->belongsTo(\App\facility::class, 'facility_id');
    }

    public function type()
    {
        return $this->belongsTo(\App\completion_type::class, 'type_id');
    }
}
