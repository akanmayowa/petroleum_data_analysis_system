<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class terrain extends Model
{
    //
    protected $table = 'terrain';

    protected $fillable = ['terrain_name', 'created_by'];

    public function Bala_oml()
    {
        return $this->hasMany(\App\Bala_oml::class, 'geological_terrain_id');
    }

    public function Bala_opl()
    {
        return $this->hasMany(\App\Bala_opl::class, 'geological_terrain_id');
    }

    public function bala_opl_oml_history()
    {
        return $this->hasMany(\App\bala_opl_oml_history::class, 'geological_terrain_id');
    }

    public function Bala_block()
    {
        return $this->hasMany(\App\Bala_block::class, 'geological_terrain_id');
    }

    public function bala_multiclient_project_status()
    {
        return $this->hasMany(\App\bala_multiclient_project_status::class, 'geological_terrain_id');
    }

    public function up_seismic_data()
    {
        return $this->hasMany(\App\up_seismic_data::class, 'geological_terrain_id');
    }

    public function gas_major_gas_facilities()
    {
        return $this->hasMany(\App\gas_major_gas_facilities::class, 'geological_terrain_id');
    }

    public function up_major_oil_facilities()
    {
        return $this->hasMany(\App\up_major_oil_facilities::class, 'geological_terrain_id');
    }

    public function field()
    {
        return $this->hasMany(\App\field::class, 'terrain_id');
    }

    public function uo_well_activities()
    {
        return $this->hasMany('App\uo_well_activities', 'terrain_id');
    }

    public function up_well_activities_by_type()
    {
        return $this->hasMany('App\up_well_activities_by_type', 'terrain_id');
    }

    public function up_rig_disposition()
    {
        return $this->hasMany(\App\up_rig_disposition::class, 'terrain_id');
    }

    public function up_reserves_oil()
    {
        return $this->hasMany(\App\up_reserves_oil::class, 'terrain_id');
    }

    public function up_reserves_report()
    {
        return $this->hasMany(\App\up_reserves_report::class, 'terrain_id');
    }

    public function SheOilSpillContingency()
    {
        return $this->hasMany(\App\SheOilSpillContingency::class, 'terrain_id');
    }
}
