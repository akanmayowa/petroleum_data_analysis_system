<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_restricting_factor extends Model
{
    //
    protected $table = 'dwp_restricting_factor';

    protected $fillable = ['restricting_factor_name', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'restricting_factor');
    }
}
