<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_geophysical extends Model
{
    //
    protected $table = 'up_geophysicals';

    protected $fillable = ['geophysical_name', 'created_by'];

    public function up_seismic_data()
    {
        return $this->hasMany(\App\up_seismic_data::class, 'geophysical_id');
    }
}
