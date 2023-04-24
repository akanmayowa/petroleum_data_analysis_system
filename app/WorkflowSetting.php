<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkflowSetting extends Model
{
    protected $fillable = ['module', 'workflow_id'];

    protected $table = 'workflow_settings';

    public function workflow()
    {
        return $this->belongsTo(\App\Workflow::class);
    }
}
