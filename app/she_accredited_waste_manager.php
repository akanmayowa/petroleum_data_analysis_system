<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_accredited_waste_manager extends Model
{
    //
    protected $table = 'she_accredited_waste_managers';

    protected $fillable = ['year', 'company_id', 'others', 'type_of_facility_id', 'facility_description', 'state_id', 'operational_status_id', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function type_of_facility()
    {
        return $this->belongsTo(\App\facility_type::class, 'type_of_facility_id');
    }

    public function location_area()
    {
        return $this->belongsTo(\App\down_outlet_states::class, 'state_id');
    }

    public function operational_status()
    {
        return $this->belongsTo(\App\gas_status::class, 'operational_status_id');
    }
}
