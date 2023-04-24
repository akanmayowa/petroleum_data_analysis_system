<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_program_priority extends Model
{
    //
    protected $table = 'dwp_program_priority';

    protected $fillable = ['program_priority_name', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'program_priority_id');
    }
}
