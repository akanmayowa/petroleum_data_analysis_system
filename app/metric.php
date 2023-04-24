<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metric extends Model
{
    //
    protected $table = 'metric';

    protected $fillable = ['metric_name', 'created_by'];

    public function mpm()
    {
        return $this->hasMany(\App\mpm::class, 'metric_id');
    }
}
