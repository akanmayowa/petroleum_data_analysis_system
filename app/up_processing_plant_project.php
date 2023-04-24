<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_processing_plant_project extends Model
{
    //
    protected $table = 'up_processing_plant_project';

    protected $fillable = ['year', 'project', 'company_id', 'others', 'location', 'terrain_id', 'expected_oil', 'expected_gas', 'expected_water', 'expected_efi', 'facility_type', 'development_type', 'start_date', 'completion_date', 'status_id', 'remark', 'pending_id', 'created_by', 'approve_by', 'approve_at', 'quality', 'end_quarter', 'capacity_increment', 'capex_investment'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'concession_id');
    }

    public function concession()
    {
        return $this->belongsTo(\App\concession::class, 'concession_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\es_project_status::class, 'status_id');
    }

    public function getstartDateQuarterAttribute()
    {
        return \Carbon\Carbon::parse($this->start_date)->quarter;
    }

    public function getcompletionDateQuaterAttribute()
    {
        return \Carbon\Carbon::parse($this->completion_date)->quarter;
    }

    public function getLiquidTypeAttribute()
    {
        return  $this->expected_oil == '' ? 'gas' : 'oil';
    }
}
