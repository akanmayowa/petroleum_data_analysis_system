<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_status extends Model
{
    //
    protected $table = 'gas_status';

    public function gas_major_gas_facilities()
    {
        return $this->hasMany(\App\gas_major_gas_facilities::class, 'status_id');
    }

    public function up_major_oil_facilities()
    {
        return $this->hasMany(\App\up_major_oil_facilities::class, 'status_id');
    }

    public function she_accredited_waste_manager()
    {
        return $this->hasMany(\App\she_accredited_waste_manager::class, 'status_id');
    }

    public function es_pipeline_project()
    {
        return $this->hasMany(\App\es_pipeline_project::class, 'status_id');
    }

    public function es_metering()
    {
        return $this->hasMany(\App\es_metering::class, 'phase_id');
    }
}
