<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    //
    protected $table = 'division';

    protected $fillable = ['division_name', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'division_id');
    }

    public function dwp_critical_milestone_matrix()
    {
        return $this->hasMany(\App\dwp_critical_milestone_matrix::class, 'division_id');
    }
}
