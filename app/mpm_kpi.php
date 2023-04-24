<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mpm_kpi extends Model
{
    //
    protected $table = 'mpm_kpi';

    protected $fillable = ['year', 'kpi_name', 'created_by'];

    public function mpm()
    {
        return $this->hasMany(\App\mpm::class, 'kpi');
    }
}
