<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class field extends Model
{
    //
    protected $table = 'field';

    protected $fillable = ['field_code', 'field_name', 'concession_id', 'company_id', 'contract_id', 'terrain_id', 'stage_id', 'batch_number', 'created_by'];

    public function Bala_marginal_field()
    {
        return $this->hasMany(\App\Bala_marginal_field::class, 'field_id');
    }

    public function bala_multiclient_project_status()
    {
        return $this->hasMany(\App\bala_multiclient_project_status::class, 'field_id');
    }

    public function up_seismic_data()
    {
        return $this->hasMany(\App\up_seismic_data::class, 'field_id');
    }

    public function up_well_activities_by_terrain()
    {
        return $this->hasMany('App\up_well_activities_by_terrain', 'field_id');
    }

    public function up_well_activities_by_class()
    {
        return $this->hasMany('App\up_well_activities_by_class', 'field_id');
    }

    public function up_well_activities_by_contract()
    {
        return $this->hasMany('App\up_well_activities_by_contract', 'field_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'terrain_id');
    }

    public function concession()
    {
        return $this->belongsTo(\App\concession::class, 'concession_id');
    }

    public function up_reserves_report()
    {
        return $this->hasMany(\App\up_reserves_report::class, 'field_id');
    }

    public function up_reserves_oil()
    {
        return $this->hasMany(\App\up_reserves_oil::class, 'field_id');
    }

    public function up_reserves_gas()
    {
        return $this->hasMany(\App\up_reserves_gas::class, 'field_id');
    }

    public function up_well_completion()
    {
        return $this->hasMany(\App\up_well_completion::class, 'field_id');
    }

    public function up_well_workover()
    {
        return $this->hasMany(\App\up_well_workover::class, 'field_id');
    }

    public function up_well_plugback_abandonment()
    {
        return $this->hasMany(\App\up_well_plugback_abandonment::class, 'field_id');
    }

    public function gas_summary_of_gas_production()
    {
        return $this->hasMany(\App\gas_summary_of_gas_production::class, 'field_id');
    }

    public function gas_summary_of_gas_utilization()
    {
        return $this->hasMany(\App\gas_summary_of_gas_utilization::class, 'field_id');
    }

    public function up_processing_plant_project()
    {
        return $this->hasMany(\App\up_processing_plant_project::class, 'location_id');
    }

    public function es_technology()
    {
        return $this->hasMany(\App\es_technology::class, 'location_id');
    }

    public function es_licensed_refinery_project()
    {
        return $this->hasMany(\App\es_licensed_refinery_project::class, 'field_id');
    }

    public function gas_processing_plant_project()
    {
        return $this->hasMany(\App\gas_processing_plant_project::class, 'location_id');
    }

    public function up_provisional_crude_production()
    {
        return $this->hasMany(\App\up_provisional_crude_production::class, 'field_id');
    }
}
