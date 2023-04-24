<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class es_project_status extends Model
{
    //
    protected $table = 'es_project_status';

    protected $fillable = ['status_name', 'created_by'];

    public function down_petrochemical_plant_project()
    {
        return $this->hasMany(\App\down_petrochemical_plant_project::class, 'status');
    }

    public function up_processing_plant_project()
    {
        return $this->hasMany(\App\up_processing_plant_project::class, 'status_id');
    }

    public function es_licensed_refinery_project()
    {
        return $this->hasMany(\App\es_licensed_refinery_project::class, 'license_validity');
    }

    public function gas_processing_plant_project()
    {
        return $this->hasMany(\App\gas_processing_plant_project::class, 'status_id');
    }

    public function es_pipeline_project()
    {
        return $this->hasMany(\App\es_pipeline_project::class, 'status_id');
    }

    public function es_metering()
    {
        return $this->hasMany(\App\es_metering::class, 'phase_id');
    }

    public function es_technology()
    {
        return $this->hasMany(\App\es_technology::class, 'status');
    }
}
