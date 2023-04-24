<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    //
    protected $table = 'company';

    protected $fillable = ['parent_company_id', 'company_code', 'company_name', 'contact_name', 'email', 'phone', 'address', 'rc_number', 'license_expire_date', 'operation_type', 'stage_id', 'batch_number', 'created_by'];

    public function Bala_oml()
    {
        return $this->hasMany(\App\Bala_oml::class, 'company_id');
    }

    public function Bala_opl()
    {
        return $this->hasMany(\App\Bala_opl::class, 'company_id');
    }

    public function bala_opl_oml_history()
    {
        return $this->hasMany(\App\bala_opl_oml_history::class, 'company_id');
    }

    public function Bala_marginal_field()
    {
        return $this->hasMany(\App\Bala_marginal_field::class, 'company_id');
    }

    public function bala_multiclient_project_status()
    {
        return $this->hasMany(\App\bala_multiclient_project_status::class, 'company_id');
    }

    public function up_provisional_crude_production()
    {
        return $this->hasMany(\App\up_provisional_crude_production::class, 'company_id');
    }

    public function up_seismic_data()
    {
        return $this->hasMany(\App\up_seismic_data::class, 'company_id');
    }

    public function up_rig_disposition()
    {
        return $this->hasMany(\App\up_rig_disposition::class, 'company_id');
    }

    public function up_well_activities_by_terrain()
    {
        return $this->hasMany('App\up_well_activities_by_terrain', 'company_id');
    }

    public function up_well_activities_by_class()
    {
        return $this->hasMany('App\up_well_activities_by_class', 'company_id');
    }

    public function up_well_activities_by_contract()
    {
        return $this->hasMany('App\up_well_activities_by_contract', 'company_id');
    }

    public function gas_major_gas_facilities()
    {
        return $this->hasMany(\App\gas_major_gas_facilities::class, 'company_id');
    }

    public function field()
    {
        return $this->hasMany(\App\field::class, 'company_id');
    }

    public function down_licensed_oil_makerters()
    {
        return $this->hasMany(\App\down_licensed_oil_makerters::class, 'company_id');
    }

    public function gas_domestic_gas_obligation()
    {
        return $this->hasMany(\App\gas_domestic_gas_obligation::class, 'company_id');
    }

    public function gas_domestic_gas_supply()
    {
        return $this->hasMany(\App\gas_domestic_gas_supply::class, 'company_id');
    }

    public function she_water_volumes_generated()
    {
        return $this->hasMany(\App\she_water_volumes_generated::class, 'company_id');
    }

    public function up_major_oil_facilities()
    {
        return $this->hasMany(\App\up_major_oil_facilities::class, 'company_id');
    }

    public function up_processing_plant_project()
    {
        return $this->hasMany(\App\up_processing_plant_project::class, 'company_id');
    }

    public function gas_processing_plant_project()
    {
        return $this->hasMany(\App\gas_processing_plant_project::class, 'company_id');
    }

    public function up_well_activities_by_type()
    {
        return $this->hasMany('App\up_well_activities_by_type', 'company_id');
    }

    public function she_accredited_waste_manager()
    {
        return $this->hasMany(\App\she_accredited_waste_manager::class, 'company_id');
    }

    public function stream()
    {
        return $this->hasMany(\App\Stream::class, 'company_id');
    }

    public function concession()
    {
        return $this->hasMany(\App\concession::class, 'company_id');
    }

    public function gas_summary_of_gas_production()
    {
        return $this->hasMany(\App\gas_summary_of_gas_production::class, 'company_id');
    }

    public function gas_summary_of_gas_utilization()
    {
        return $this->hasMany(\App\gas_summary_of_gas_utilization::class, 'company_id');
    }

    public function down_crude_export_by_destination()
    {
        return $this->hasMany(\App\down_crude_export_by_destination::class, 'company_id');
    }

    public function down_crude_export_by_company()
    {
        return $this->hasMany(\App\down_crude_export_by_company::class, 'country_id');
    }

    public function gas_retail_outlet_summary()
    {
        return $this->hasMany('App\gas_retail_outlet_summary', 'company_id');
    }

    public function gas_outlet_storage_capacity()
    {
        return $this->hasMany(\App\gas_outlet_storage_capacity::class, 'company_id');
    }

    public function down_terminal_stream_prod()
    {
        return $this->hasMany(\App\down_terminal_stream_prod::class, 'company_id');
    }

    public function down_refinary_production()
    {
        return $this->hasMany(\App\down_refinary_production::class, 'company_id');
    }

    public function es_pipeline_project()
    {
        return $this->hasMany(\App\es_pipeline_project::class, 'owner_id');
    }

    public function es_metering()
    {
        return $this->hasMany(\App\es_metering::class, 'company_id');
    }

    public function es_technology()
    {
        return $this->hasMany(\App\es_technology::class, 'company_id');
    }

    public function es_licensed_refinery_project()
    {
        return $this->hasMany(\App\es_licensed_refinery_project::class, 'company_id');
    }

    public function up_crude_production_deferment()
    {
        return $this->hasMany(\App\up_crude_production_deferment::class, 'company_id');
    }

    public function up_reserves_oil()
    {
        return $this->hasMany(\App\up_reserves_oil::class, 'company_id');
    }

    public function up_reserves_condensate()
    {
        return $this->hasMany('App\up_reserves_condensate', 'company_id');
    }

    public function up_reserves_gas()
    {
        return $this->hasMany(\App\up_reserves_gas::class, 'company_id');
    }

    public function up_reserve_addition_depletion_rate()
    {
        return $this->hasMany(\App\up_reserve_addition_depletion_rate::class, 'company_id');
    }

    public function gas_export_volume_vessel()
    {
        return $this->hasMany(\App\gas_export_volume_vessel::class, 'equity_holder_id');
    }

    public function gas_refinery_production_volumes()
    {
        return $this->hasMany(\App\gas_refinery_production_volumes::class, 'company_id');
    }

    public function she_effluent_waste_discharged()
    {
        return $this->hasMany(\App\she_effluent_waste_discharged::class, 'company_id');
    }

    public function she_environmental_studies()
    {
        return $this->hasMany(\App\she_environmental_studies::class, 'company_id');
    }

    public function gas_product_monitoring()
    {
        return $this->hasMany(\App\gas_product_monitoring::class, 'company_id');
    }

    public function up_drilling_gas_well()
    {
        return $this->hasMany('App\up_drilling_gas_well', 'company_id');
    }

    public function parent_company()
    {
        return$this->belongsTo(\App\company_parent::class, 'parent_company_id');
    }

    public function companies()
    {
        return $this->hasMany('company')->orderBy('company_name');
    }
}
