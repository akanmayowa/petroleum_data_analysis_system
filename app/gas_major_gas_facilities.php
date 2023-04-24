<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_major_gas_facilities extends Model
{
    //
    protected $table = 'gas_major_gas_facilities';

    protected $fillable = ['year', 'month', 'company_id', 'facility_id', 'facility_type_id', 'location_id', 'terrain_id', 'design_capacity', 'operating_capacity', 'facility_design_life', 'date_of_commissioning', 'status_id', 'license_status', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function facility()
    {
        return $this->belongsTo(\App\facility::class, 'facility_id');
    }

    public function facility_type()
    {
        return $this->belongsTo(\App\facility_type::class, 'facility_type_id');
    }

    public function location()
    {
        return $this->belongsTo(\App\location::class, 'location_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'terrain_id');
    }

    public function gas_status()
    {
        return $this->belongsTo(\App\gas_status::class, 'status_id');
    }
}
