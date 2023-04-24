<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facility extends Model
{
    //
    protected $table = 'facility';

    protected $fillable = ['facility_code', 'facility_name', 'stage_id', 'batch_number', 'created_by'];

    public function gas_major_gas_facilities()
    {
        return $this->hasMany(\App\gas_major_gas_facilities::class, 'facility_id');
    }

    public function she_water_volumes_generated()
    {
        return $this->hasMany(\App\she_water_volumes_generated::class, 'facility_id');
    }

    public function up_major_oil_facilities()
    {
        return $this->hasMany(\App\up_major_oil_facilities::class, 'facility_id');
    }

    public function es_metering()
    {
        return $this->hasMany(\App\es_metering::class, 'facility_id');
    }

    public function up_drilling_gas()
    {
        return $this->hasMany(\App\up_drilling_gas::class, 'facility_id');
    }

    public function up_well_workover()
    {
        return $this->hasMany(\App\up_well_workover::class, 'facility_id');
    }
}
