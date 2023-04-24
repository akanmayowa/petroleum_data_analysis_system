<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mpm_frequency_of_measurement extends Model
{
    //
    protected $table = 'mpm_frequency_of_measurement';

    protected $fillable = ['frequency_name', 'created_by'];

    public function mpm()
    {
        return $this->hasMany(\App\mpm::class, 'frequency_of_measurement_id');
    }
}
