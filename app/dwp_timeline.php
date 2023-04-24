<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_timeline extends Model
{
    //
    protected $table = 'dwp_timeline';

    protected $fillable = ['timeline_name', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'timeline_id');
    }
}
