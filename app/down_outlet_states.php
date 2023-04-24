<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_outlet_states extends Model
{
    //
    protected $table = 'down_outlet_states';

    public function down_retail_outlet_summary()
    {
        return $this->hasMany(\App\down_retail_outlet_summary::class, 'state_id');
    }

    public function down_outlet_storage_capacity()
    {
        return $this->hasMany(\App\down_outlet_storage_capacity::class, 'state_id');
    }

    public function she_accredited_waste_manager()
    {
        return $this->hasMany(\App\she_accredited_waste_manager::class, 'state_id');
    }

    public function down_refinary_capacity_utilization()
    {
        return $this->hasMany(\App\down_refinary_capacity_utilization::class, 'state_id');
    }

    public function down_refinery_performance()
    {
        return $this->hasMany(\App\down_refinery_performance::class, 'state_id');
    }

    public function down_petrochemical_plant()
    {
        return $this->hasMany(\App\down_petrochemical_plant::class, 'state_id');
    }

    public function down_depot()
    {
        return $this->hasMany(\App\down_jetty::class, 'state_id');
    }

    public function down_jetty()
    {
        return $this->hasMany(\App\down_jetty::class, 'state_id');
    }

    public function down_terminal()
    {
        return $this->hasMany(\App\down_jetty::class, 'state_id');
    }

    public function down_petrochemical_plant_project()
    {
        return $this->hasMany(\App\down_petrochemical_plant_project::class, 'state_id');
    }

    public function es_licensed_refinery_project()
    {
        return $this->hasMany(\App\es_licensed_refinery_project::class, 'state_id');
    }

    public function gas_refinery_production_volumes()
    {
        return $this->hasMany(\App\gas_refinery_production_volumes::class, 'state_id');
    }

    public function gas_product_lpg()
    {
        return $this->hasMany('App\gas_product_lpg', 'state_id');
    }

    public function SheOilSpillContingency()
    {
        return $this->hasMany(\App\SheOilSpillContingency::class, 'state_id');
    }
}
