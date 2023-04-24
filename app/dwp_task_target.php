<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_task_target extends Model
{
    //
    protected $table = 'dwp_task_target';

    protected $fillable = ['task_target_name', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'dpr_work_plan');
    }
}
