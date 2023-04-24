<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_assign_to extends Model
{
    //
    protected $table = 'dwp_assign_to';

    protected $fillable = ['dwp_id', 'assign_to_role', 'created_by'];

    public function dwp()
    {
        return $this->belongsTo(\App\dwp::class, 'dwp_id');
    }

    public function roles()
    {
        return $this->belongsTo(\App\roles::class, 'assign_to_role');
    }
}
