<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    //
    protected $table = 'stages';

    protected $fillable = ['name', 'workflow_id', 'type', 'user_id', 'role_id', 'position'];

    public function workflow()
    {
        return $this->belongsTo(\App\Workflow::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(\App\roles::class, 'role_id');
    }
}
