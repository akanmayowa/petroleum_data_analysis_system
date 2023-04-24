<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_key_recovery_plan extends Model
{
    //
    protected $table = 'dwp_key_recovery_plan';

    protected $fillable = ['key_recovery_plan_name', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'kpi_target_id');
    }
}
