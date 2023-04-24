<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_critical_milestone extends Model
{
    //
    protected $table = 'dwp_critical_milestone';

    protected $fillable = ['critical_milestone_name', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'critical_milestone_id');
    }
}
