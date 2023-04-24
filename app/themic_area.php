<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class themic_area extends Model
{
    //
    protected $table = 'themic_area';

    protected $fillable = ['themic_area_name', 'year', 'created_by'];

    public function mpm()
    {
        return $this->hasMany(\App\mpm::class, 'themic_id');
    }
}
