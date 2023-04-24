<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class source extends Model
{
    //
    protected $table = 'source';

    protected $fillable = ['source_name', 'created_by'];

    public function mpm()
    {
        return $this->hasMany(\App\mpm::class, 'source_id');
    }
}
