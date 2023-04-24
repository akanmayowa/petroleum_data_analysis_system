<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class key_result_area extends Model
{
    //
    protected $table = 'key_result_area';

    protected $fillable = ['year', 'result_area_name', 'created_by'];

    public function mpm()
    {
        return $this->hasMany(\App\mpm::class, 'key_result_area_id');
    }
}
