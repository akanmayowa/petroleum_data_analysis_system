<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_responsible_unit extends Model
{
    //
    protected $table = 'dwp_responsible_unit';

    protected $fillable = ['responsible_unit_name', 'created_by'];

    public function critical_milestone_matrix()
    {
        return $this->hasMany(\App\dwp_critical_milestone_matrix::class, 'responsible_unit_id')->withDefault();
    }
}
