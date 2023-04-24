<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_zone extends Model
{
    //
    protected $table = 'she_zones';

    protected $fillable = ['zone_name', 'type_id', 'created_by'];

    public function SheOilSpillContingency()
    {
        return $this->hasMany(\App\SheOilSpillContingency::class, 'state_id');
    }
}
