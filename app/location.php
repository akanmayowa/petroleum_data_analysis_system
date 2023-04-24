<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    //
    protected $table = 'location';

    protected $fillable = ['location_name', 'created_by'];

    public function gas_major_gas_facilities()
    {
        return $this->hasMany(\App\gas_major_gas_facilities::class, 'location_id');
    }

    public function up_major_oil_facilities()
    {
        return $this->hasMany(\App\up_major_oil_facilities::class, 'location_id');
    }

    public function up_processing_plant_project()
    {
        return $this->hasMany(\App\up_processing_plant_project::class, 'location_id');
    }
}
