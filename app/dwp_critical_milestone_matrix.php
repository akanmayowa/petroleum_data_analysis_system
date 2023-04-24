<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_critical_milestone_matrix extends Model
{
    //
    protected $table = 'dwp_critical_milestone_matrix';

    protected $fillable = ['year', 'division_id', 'dpr_pp_milestones', 'priority_milestone', 'critical_milestones_count', 'created_by'];

    public function division()
    {
        return $this->belongsTo(\App\division::class, 'division_id')->withDefault();
    }
}
