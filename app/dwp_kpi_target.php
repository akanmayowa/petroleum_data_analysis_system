<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_kpi_target extends Model
{
    //
    protected $table = 'dwp_kpi_target';

    protected $fillable = ['kpi_name', 'kpi_target', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'kpi_target_id');
    }
}
