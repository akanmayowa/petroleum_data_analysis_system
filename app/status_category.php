<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status_category extends Model
{
    //
    protected $table = 'status_category';

    protected $fillable = ['status', 'score', 'created_by'];

    public function up_seismic_data()
    {
        return $this->hasMany(\App\up_seismic_data::class, 'status');
    }

    public function war()
    {
        return $this->hasMany(\App\war::class, 'status');
    }

    public function gas_processing_plant_project()
    {
        return $this->hasMany(\App\gas_processing_plant_project::class, 'status_id');
    }
}
