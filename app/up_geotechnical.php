<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_geotechnical extends Model
{
    //
    protected $table = 'up_geotechnicals';

    protected $fillable = ['geotechnical_name', 'created_by'];

    public function up_seismic_data()
    {
        return $this->hasMany(\App\up_seismic_data::class, 'geophysical_id');
    }
}
