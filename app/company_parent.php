<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company_parent extends Model
{
    //
    protected $table = 'company_parent';

    protected $fillable = ['company_code', 'company_name', 'address', 'created_by'];

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

    public function company()
    {
        return $this->hasMany(\App\company::class, 'parent_company_id');
    }
}
