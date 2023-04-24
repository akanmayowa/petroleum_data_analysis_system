<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp extends Model
{
    //
    protected $table = 'dwp';

    protected $fillable = ['year', 'month', 'alignment_id', 'program_priority_id', 'task_and_target', 'kpi_target_id', 'critical_milestone_id', 'timeline_id', 'division_id', 'critical_path_activity', 'achievement_status_id', 'restricting_factor', 'cost_benefit_factor', 'key_recovery_plan_id', 'status', 'monitored_by', 'created_by'];

    public function alignment()
    {
        return $this->belongsTo(\App\alignment::class, 'alignment_id');
    }

    public function division()
    {
        return $this->belongsTo(\App\division::class, 'division_id');
    }

    public function program_priority()
    {
        return $this->belongsTo(\App\dwp_program_priority::class, 'program_priority_id');
    }

    public function task_target()
    {
        return $this->belongsTo(\App\dwp_task_target::class, 'task_and_target');
    }

    public function critical_milestone()
    {
        return $this->belongsTo(\App\dwp_critical_milestone::class, 'critical_milestone_id');
    }

    public function timeline()
    {
        return $this->belongsTo(\App\dwp_timeline::class, 'timeline_id');
    }

    public function achievement_status()
    {
        return $this->belongsTo(\App\dwp_achievement_status::class, 'achievement_status_id');
    }

    public function restricting_factors()
    {
        return $this->belongsTo(\App\dwp_restricting_factor::class, 'restricting_factor');
    }

    public function kpi_target()
    {
        return $this->belongsTo(\App\dwp_kpi_target::class, 'kpi_target_id');
    }

    public function key_recovery_plan()
    {
        return $this->belongsTo(\App\dwp_key_recovery_plan::class, 'key_recovery_plan_id');
    }

    public function status_category()
    {
        return $this->belongsTo(\App\status_category::class, 'status');
    }

    public function dwp_assign_to()
    {
        return $this->belongsTo(\App\dwp_assign_to::class, 'dwp_id');
    }

    public function getNotStartedAttribute()
    {
        $id = $this->program_priority_id;

        return $this->where('program_priority_id', $id)->where('achievement_status_id', 1)->count();
    }

    public function getPreliminaryAttribute()
    {
        $id = $this->program_priority_id;

        return $this->where('program_priority_id', $id)->where('achievement_status_id', 2)->count();
    }

    public function getHalfwayAttribute()
    {
        $id = $this->program_priority_id;

        return $this->where('program_priority_id', $id)->where('achievement_status_id', 3)->count();
    }

    public function getGreaterThanHalfAttribute()
    {
        $id = $this->program_priority_id;

        return $this->where('program_priority_id', $id)->where('achievement_status_id', 4)->count();
    }

    public function getAchievedAttribute()
    {
        $id = $this->program_priority_id;

        return $this->where('program_priority_id', $id)->where('achievement_status_id', 5)->count();
        // return $this->whereHas('achievement_status', function($query)
        // {
        //     $query->where('status', 1);
        // })->whereHas('program_priority', function($query) use($id){  $query->where('id', $id);  })->count();
    }
}
